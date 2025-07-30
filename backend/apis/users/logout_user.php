<?php
include('../../../connection/db_connect.php');// include your DB connection file

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// Read raw JSON input
$input = json_decode(file_get_contents("php://input"), true);
$token = $input['token'] ?? '';

if (empty($token)) {
    $response['message'] = 'Token is required.';
    echo json_encode($response);
    exit;
}

try {
    // Check if token exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE token = :token LIMIT 1");
    $stmt->execute([':token' => $token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Logout user: reset is_loggedin to '0' and clear token
        $updateStmt = $pdo->prepare("UPDATE users SET is_loggedin = '0', token = NULL WHERE id = :id");
        $updateStmt->execute([':id' => $user['id']]);

        $response['success'] = true;
        $response['message'] = 'Logout successful.';
    } else {
        $response['message'] = 'Invalid token.';
    }

} catch (PDOException $e) {
    $response['message'] = 'Logout failed: ' . $e->getMessage();
}

echo json_encode($response);
