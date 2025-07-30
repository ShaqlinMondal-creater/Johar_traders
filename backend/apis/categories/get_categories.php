<?php
// Include database connection
include('../../../connection/db_connect.php'); // Correct your path

header('Content-Type: application/json');

// Get the raw POST data
$input = json_decode(file_get_contents('php://input'), true);

// Validate input data
$category_name = isset($input['category_name']) ? $input['category_name'] : null;
$category_slug = isset($input['category_slug']) ? $input['category_slug'] : null;
$page = isset($input['page']) ? max(intval($input['page']), 1) : 1;  // Default to page 1
$limit = isset($input['limit']) ? max(intval($input['limit']), 1) : 10; // Default to 10 items per page

// Calculate offset for pagination
$offset = ($page - 1) * $limit;

// Build base query with filters
$where = "1";  // Always true
$params = [];

if ($category_name) {
    $where .= " AND name LIKE :category_name";
    $params[':category_name'] = "%" . $category_name . "%";  // Use LIKE for partial matches
}

if ($category_slug) {
    $where .= " AND slug LIKE :category_slug";
    $params[':category_slug'] = "%" . $category_slug . "%";  // Use LIKE for partial matches
}

// Fetch categories (Including all fields specified)
$query = "SELECT id, name, slug
          FROM categories
          WHERE $where
          LIMIT :limit OFFSET :offset";

$stmt = $pdo->prepare($query);

// Bind parameters dynamically
foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
}
$stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);

$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get total count (with same filters)
$total_query = "SELECT COUNT(*) AS total
                FROM categories
                WHERE $where";

$total_stmt = $pdo->prepare($total_query);
foreach ($params as $key => $value) {
    $total_stmt->bindValue($key, $value);
}
$total_stmt->execute();
$total = $total_stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Prepare JSON response
$response = [
    'status' => 'success',
    'data' => $categories,
    'pagination' => [
        'total' => (int)$total,
        'page' => (int)$page,
        'limit' => (int)$limit,
        'total_pages' => ceil($total / $limit)
    ]
];

// Return JSON response
echo json_encode($response);
?>
