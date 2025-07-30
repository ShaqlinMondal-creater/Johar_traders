<?php
// Include database connection
include('../../connection/db_connect.php'); // Correct your path

header('Content-Type: application/json');

// Get the token and role from the URL
$token = isset($_GET['token']) ? $_GET['token'] : null;
$role = isset($_GET['role']) ? $_GET['role'] : null;

// Validate token and role
if (!$token || !$role) {
    echo json_encode(['status' => 'error', 'message' => 'Token and role are required.']);
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
    echo json_encode(['status' => 'error', 'message' => 'You must be an admin to access the dashboard.']);
    exit;
}

// Get counts for various entities

// Count total products
$product_query = "SELECT COUNT(*) AS total FROM products";
$product_stmt = $pdo->prepare($product_query);
$product_stmt->execute();
$product_count = $product_stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Count total categories
$category_query = "SELECT COUNT(*) AS total FROM categories";
$category_stmt = $pdo->prepare($category_query);
$category_stmt->execute();
$category_count = $category_stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Count total users
$user_query = "SELECT COUNT(*) AS total FROM users";
$user_stmt = $pdo->prepare($user_query);
$user_stmt->execute();
$user_count = $user_stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Count total orders (if any order system is implemented)
// $order_query = "SELECT COUNT(*) AS total FROM orders";
// $order_stmt = $pdo->prepare($order_query);
// $order_stmt->execute();
// $order_count = $order_stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Prepare response with counts for the dashboard
$response = [
    'status' => 'success',
    'data' => [
        'total_products' => $product_count,
        'total_categories' => $category_count,
        'total_users' => $user_count,
        // 'total_orders' => $order_count // You can add other counts if necessary
    ]
];

echo json_encode($response);
?>
