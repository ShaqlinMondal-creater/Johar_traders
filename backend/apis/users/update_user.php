<?php
include('../../../connection/db_connect.php');// include your DB connection file

header('Content-Type: application/json');

$response = ['success' => false, 'message' => '', 'data' => null];

// Read raw JSON input
$input = json_decode(file_get_contents("php://input"), true);

$token     = $input['token'] ?? '';
$user_name = $input['user_name'] ?? '';
$address   = $input['address'] ?? '';
$mobile    = $input['mobile'] ?? '';

if (empty($token)) {
    $response['message'] = 'Token is required.';
    echo json_encode($response);
    exit;
}

try {
    // Check if the token is valid
    $stmt = $pdo->prepare("SELECT * FROM users WHERE token = :token AND is_loggedin = '1' LIMIT 1");
    $stmt->execute([':token' => $token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Update user details
        $updateStmt = $pdo->prepare("
            UPDATE users 
            SET user_name = :user_name, address = :address, mobile = :mobile
            WHERE token = :token
        ");
        $updateStmt->execute([
            ':user_name' => $user_name ?: $user['user_name'],
            ':address'   => $address ?: $user['address'],
            ':mobile'    => $mobile ?: $user['mobile'],
            ':token'     => $token
        ]);

        // Fetch updated details
        $fetchStmt = $pdo->prepare("SELECT id, user_name, address, mobile, role, token, is_loggedin FROM users WHERE token = :token");
        $fetchStmt->execute([':token' => $token]);
        $updatedUser = $fetchStmt->fetch(PDO::FETCH_ASSOC);

        $response['success'] = true;
        $response['message'] = 'User updated successfully.';
        $response['data'] = $updatedUser;
    } else {
        $response['message'] = 'Invalid token or user not logged in.';
    }

} catch (PDOException $e) {
    $response['message'] = 'Update failed: ' . $e->getMessage();
}

echo json_encode($response);