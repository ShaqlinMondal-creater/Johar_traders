<?php
// Include database connection
include('../../../connection/db_connect.php'); // Correct your path

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
    echo json_encode(['status' => 'error', 'message' => 'You must be an admin to create or update categories.']);
    exit;
}

// Get the raw POST data
$input = json_decode(file_get_contents('php://input'), true);

// Validate input data
if (!isset($input['name'])) {
    echo json_encode(['status' => 'error', 'message' => 'Category name is required.']);
    exit;
}

// Extract category data
$category_id = isset($input['category_id']) ? intval($input['category_id']) : null;
$name = $input['name'];
$parent_id = isset($input['parent_id']) ? intval($input['parent_id']) : 0; // Default to 0 if not passed
$level = isset($input['level']) ? intval($input['level']) : 0; // Default to 0 if not passed

// Generate slug based on category name
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

// Check if the generated slug already exists (for both Create and Update)
$query = "SELECT COUNT(*) AS total FROM categories WHERE slug = :slug";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':slug', $slug);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// If the slug already exists, append a random 8-character string
if ($result['total'] > 0) {
    $slug .= '-' . substr(md5(uniqid(rand(), true)), 0, 8); // Append random string to make it unique
}

// If category_id is provided, update the category; otherwise, create a new category
if ($category_id) {
    // Update category query
    $query = "UPDATE categories 
              SET name = :name, slug = :slug, parent_id = :parent_id, level = :level 
              WHERE id = :category_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':category_id', $category_id);
} else {
    // Create category query
    $query = "INSERT INTO categories (name, slug, parent_id, level) 
              VALUES (:name, :slug, :parent_id, :level)";

    $stmt = $pdo->prepare($query);
}

// Bind parameters for both queries
$stmt->bindValue(':name', $name);
$stmt->bindValue(':slug', $slug);
$stmt->bindValue(':parent_id', $parent_id);
$stmt->bindValue(':level', $level);

// Execute the query
$stmt->execute();

// Get the last inserted or updated category ID
$category_id = $category_id ?: $pdo->lastInsertId(); // If updating, use provided ID; if creating, use the last inserted ID

// Prepare response with the category ID included
$response = [
    'status' => 'success',
    'message' => $category_id ? 'Category updated successfully' : 'Category created successfully',
    'data' => [
        'category_id' => $category_id,
        'name' => $name,
        'slug' => $slug,
        'parent_id' => $parent_id,
        'level' => $level
    ]
];

echo json_encode($response);
?>
