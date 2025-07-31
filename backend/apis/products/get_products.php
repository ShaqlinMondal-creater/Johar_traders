<?php
include('../../../connection/db_connect.php');
header('Content-Type: application/json');

// Read input JSON (POST or raw)
$input = json_decode(file_get_contents("php://input"), true);

// Filters
$category_name = $input['category_name'] ?? null;
$product_name  = $input['product_name'] ?? null;
$product_slug  = $input['product_slug'] ?? null;
$limit         = isset($input['limit']) ? intval($input['limit']) : 16;
$offset        = isset($input['offset']) ? intval($input['offset']) : 0;

// WHERE clause
$where = "1";
$params = [];

if (!empty($category_name)) {
    $where .= " AND c.name LIKE :category_name";
    $params[':category_name'] = "%$category_name%";
}

if (!empty($product_name)) {
    $where .= " AND p.name LIKE :product_name";
    $params[':product_name'] = "%$product_name%";
}

if (!empty($product_slug)) {
    $where .= " AND p.slug = :product_slug";
    $params[':product_slug'] = $product_slug;
}

// Main product query with JOINs
$query = "
    SELECT 
        p.id, p.sku, p.name, p.image_link, p.photos, p.thumbnail_img, p.description, p.features,
        p.user_id, p.category_id, p.brand_id, p.slug, p.colors, p.published, p.unit,

        b.id AS brand_id, b.name AS brand_name, b.slug AS brand_slug,
        c.id AS category_id, c.name AS category_name, c.slug AS category_slug,
        u.id AS user_id, u.user_name

    FROM products p
    LEFT JOIN brands b ON p.brand_id = b.id
    LEFT JOIN categories c ON p.category_id = c.id
    LEFT JOIN users u ON p.user_id = u.id
    WHERE $where
    LIMIT :limit OFFSET :offset
";

$stmt = $pdo->prepare($query);

// Bind filter values
foreach ($params as $key => $val) {
    $stmt->bindValue($key, $val);
}
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Format each row with nested objects
$products = [];
foreach ($rows as $row) {
    $products[] = [
        'id'             => $row['id'],
        'sku'            => $row['sku'],
        'name'           => $row['name'],
        'image_link'     => $row['image_link'],
        'photos'         => $row['photos'],
        'thumbnail_img'  => $row['thumbnail_img'],
        'description'    => $row['description'],
        'features'       => $row['features'],
        'user_id'        => $row['user_id'],
        'category_id'    => $row['category_id'],
        'brand_id'       => $row['brand_id'],
        'slug'           => $row['slug'],
        'colors'         => $row['colors'],
        'published'      => $row['published'],
        'unit'           => $row['unit'],
        'brand' => [
            'brand_id'   => $row['brand_id'],
            'brand_name' => $row['brand_name'],
            'brand_slug' => $row['brand_slug']
        ],
        'category' => [
            'category_id'   => $row['category_id'],
            'category_name' => $row['category_name'],
            'category_slug' => $row['category_slug']
        ],
        'user' => [
            'user_id'   => $row['user_id'],
            'user_name' => $row['user_name']
        ]
    ];
}

// Count total (optional)
$total_query = "
    SELECT COUNT(*) AS total
    FROM products p
    LEFT JOIN brands b ON p.brand_id = b.id
    LEFT JOIN categories c ON p.category_id = c.id
    LEFT JOIN users u ON p.user_id = u.id
    WHERE $where
";
$total_stmt = $pdo->prepare($total_query);
foreach ($params as $key => $val) {
    $total_stmt->bindValue($key, $val);
}
$total_stmt->execute();
$total = $total_stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Final JSON output
echo json_encode([
    'status' => 'success',
    'data' => $products,
    'pagination' => [
        'total' => (int)$total,
        'limit' => $limit,
        'offset' => $offset,
        'total_pages' => ceil($total / $limit)
    ]
]);
