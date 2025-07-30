<?php
include('../../../connection/db_connect.php');// include your DB connection file

header('Content-Type: application/json');

$response = ['success' => false, 'message' => '', 'data' => null];

// Read raw JSON input
$input = json_decode(file_get_contents("php://input"), true);

$user_name = $input['user_name'] ?? '';
$password  = $input['password'] ?? '';

if (empty($user_name) || empty($password)) {
    $response['message'] = 'Username and password are required.';
    echo json_encode($response);
    exit;
}

// Generate a new 24-character random token
function generateToken($length = 24) {
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+=-[]{}|;:,.<>?';
    $token = '';
    for ($i = 0; $i < $length; $i++) {
        $token .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $token;
}

try {
    // Fetch user by username
    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_name = :user_name LIMIT 1");
    $stmt->execute([':user_name' => $user_name]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Generate new token
        $newToken = generateToken();

        // Update token and login status (set is_loggedin = '1')
        $updateStmt = $pdo->prepare("UPDATE users SET token = :token, is_loggedin = '1' WHERE id = :id");
        $updateStmt->execute([
            ':token' => $newToken,
            ':id'    => $user['id']
        ]);

        $response['success'] = true;
        $response['message'] = 'Login successful.';
        $response['data'] = [
            'id'         => $user['id'],
            'name'       => $user['name'],
            'email'  => $user['user_name'],
            'role'       => $user['role'],
            'token'      => $newToken,
            'is_loggedin'=> '1'
        ];
    } else {
        $response['message'] = 'Invalid username or password.';
    }

} catch (PDOException $e) {
    $response['message'] = 'Login failed: ' . $e->getMessage();
}

echo json_encode($response);
