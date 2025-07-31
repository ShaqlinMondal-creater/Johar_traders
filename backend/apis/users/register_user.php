<?php
include('../../../connection/db_connect.php');// include your DB connection file

header('Content-Type: application/json');

$response = ['success' => false, 'message' => '', 'data' => null];

// Read raw JSON input
$input = json_decode(file_get_contents("php://input"), true);

$user_name = $input['user_name'] ?? '';
$password  = $input['password'] ?? '';
$role      = $input['role'] ?? 'user';

if (empty($user_name) || empty($password)) {
    $response['message'] = 'Username and password are required.';
    echo json_encode($response);
    exit;
}

// Generate a 24-character random token
function generateToken($length = 24) {
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = '';
    for ($i = 0; $i < $length; $i++) {
        $token .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $token;
}
$token = generateToken();

// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

try {
    // Insert user into database
    $stmt = $pdo->prepare("INSERT INTO users (user_name, password, role, token, is_loggedin) 
                           VALUES (:user_name, :password, :role, :token, 0)");
    $stmt->execute([
        ':user_name' => $user_name,
        ':password'  => $hashed_password,
        ':role'      => $role,
        ':token'     => $token
    ]);

    $response['success'] = true;
    $response['message'] = 'User registered successfully.';
    $response['data'] = [
        'id'         => $pdo->lastInsertId(),
        'user_name'  => $user_name,
        'password'   => $hashed_password,
        'role'       => $role,
        'token'      => $token,
        'is_loggedin'=> 0
    ];

} catch (PDOException $e) {
    $response['message'] = 'Registration failed: ' . $e->getMessage();
}

echo json_encode($response);
