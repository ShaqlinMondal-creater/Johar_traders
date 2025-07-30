<?php
// Include database connection
include('../../../connection/db_connect.php'); // Correct your path

header('Content-Type: application/json');

// Get the token and role from the URL
$token = isset($_GET['token']) ? $_GET['token'] : null;
$role = isset($_GET['role']) ? $_GET['role'] : null;
$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : null;  // Category ID to delete

// Validate token, role, and category ID
if (!$token || !$role || !$category_id) {
    echo json_encode(['status' => 'error', 'message' => 'Token, role, and category_id are required.']);
    exit;
}

// Verify if the token exists and the role is admin
$query = "SELECT id, role FROM users WHERE token = :token LIMIT 1";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':token', $token);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user exists and role is admin
if (!$user) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid token.']);
    exit;
}

if ($user['role'] !== 'admin' || $role !== 'admin') {
    echo json_encode(['status' => 'error', 'message' => 'You must be an admin to delete categories.']);
    exit;
}

// Check if the category exists in the database
$check_query = "SELECT id FROM categories WHERE id = :category_id LIMIT 1";
$check_stmt = $pdo->prepare($check_query);
$check_stmt->bindValue(':category_id', $category_id);
$check_stmt->execute();
$category = $check_stmt->fetch(PDO::FETCH_ASSOC);

if (!$category) {
    echo json_encode(['status' => 'error', 'message' => 'Category not found.']);
    exit;
}

// Start a transaction
$pdo->beginTransaction();

try {
    // Delete the category
    $delete_query = "DELETE FROM categories WHERE id = :category_id";
    $delete_stmt = $pdo->prepare($delete_query);
    $delete_stmt->bindValue(':category_id', $category_id);
    $delete_stmt->execute();

    // Commit the transaction
    $pdo->commit();

    // Prepare response
    $response = [
        'status' => 'success',
        'message' => 'Category deleted successfully',
        'data' => [
            'category_id' => $category_id
        ]
    ];

    echo json_encode($response);
} catch (Exception $e) {
    // Rollback the transaction if there was an error
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'message' => 'Error deleting category: ' . $e->getMessage()]);
}
?>
