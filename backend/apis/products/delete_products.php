<?php
// Include database connection
include('../../../connection/db_connect.php'); // Correct your path

header('Content-Type: application/json');

// Get the token and role from the URL
$token = isset($_GET['token']) ? $_GET['token'] : null;
$role = isset($_GET['role']) ? $_GET['role'] : null;
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : null;  // Product ID to delete

// Validate token, role, and product ID
if (!$token || !$role || !$product_id) {
    echo json_encode(['status' => 'error', 'message' => 'Token, role, and product_id are required.']);
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
    echo json_encode(['status' => 'error', 'message' => 'You must be an admin to delete products.']);
    exit;
}

// Start a transaction
$pdo->beginTransaction();

try {
    // Check if the product exists in the database
    $check_query = "SELECT id FROM products WHERE id = :product_id LIMIT 1";
    $check_stmt = $pdo->prepare($check_query);
    $check_stmt->bindValue(':product_id', $product_id);
    $check_stmt->execute();

    $product = $check_stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        echo json_encode(['status' => 'error', 'message' => 'Product not found.']);
        exit;
    }

    // Delete product categories association
    $delete_category_query = "DELETE FROM product_categories WHERE product_id = :product_id";
    $delete_category_stmt = $pdo->prepare($delete_category_query);
    $delete_category_stmt->bindValue(':product_id', $product_id);
    $delete_category_stmt->execute();

    // Delete the product from the products table
    $delete_query = "DELETE FROM products WHERE id = :product_id";
    $delete_stmt = $pdo->prepare($delete_query);
    $delete_stmt->bindValue(':product_id', $product_id);
    $delete_stmt->execute();

    // Commit the transaction
    $pdo->commit();

    // Prepare response
    $response = [
        'status' => 'success',
        'message' => 'Product deleted successfully',
        'data' => [
            'product_id' => $product_id
        ]
    ];
    echo json_encode($response);

} catch (Exception $e) {
    // Rollback the transaction if there was an error
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'message' => 'Error deleting product: ' . $e->getMessage()]);
}
?>
