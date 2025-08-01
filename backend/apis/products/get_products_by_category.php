<?php
include('../../../connection/db_connect.php');

header('Content-Type: application/json');

// Read category_id from request
$input = json_decode(file_get_contents("php://input"), true);

// Debug log (remove later)
file_put_contents('debug_input.log', print_r($input, true));

$category_input = $input['category_id'] ?? '';

if (empty($category_input)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'category_id is required.'
    ]);
    exit;
}

// Step 1: Clean and parse category IDs
$category_ids = array_filter(array_map('trim', explode(',', $category_input)), 'is_numeric');
if (empty($category_ids)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'No valid category IDs provided.'
    ]);
    exit;
}

// Step 2: Prepare grouped response
$grouped = [];

foreach ($category_ids as $category_id) {
    // Fetch category info + 10 products
    $query = "
        SELECT 
            p.id, p.name, p.sku, p.slug, p.image_link, p.photos, p.unit_price, p.category_id,
            c.name AS category_name, c.slug AS category_slug
        FROM products p
        LEFT JOIN categories c ON p.category_id = c.id
        WHERE p.category_id = ?
        LIMIT 10
    ";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$category_id]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($products)) {
        $first = $products[0]; // get category info from first row
        $grouped[] = [
            'category_id'   => $first['category_id'],
            'category_name' => $first['category_name'],
            'category_slug' => $first['category_slug'],
            'products' => array_map(function ($p) {
                return [
                    'id'         => $p['id'],
                    'name'       => $p['name'],
                    'sku'        => $p['sku'],
                    'slug'       => $p['slug'],
                    'image_link' => $p['image_link'],
                    'photos' => $p['photos'],
                    'unit_price' => $p['unit_price']
                ];
            }, $products)
        ];
    } else {
        // Still include the category block with empty products
        $catQuery = $pdo->prepare("SELECT id, name, slug FROM categories WHERE id = ?");
        $catQuery->execute([$category_id]);
        $cat = $catQuery->fetch(PDO::FETCH_ASSOC);

        if ($cat) {
            $grouped[] = [
                'category_id'   => $cat['id'],
                'category_name' => $cat['name'],
                'category_slug' => $cat['slug'],
                'products' => []
            ];
        }
    }
}

// Final output
echo json_encode([
    'status' => 'success',
    'categories' => $grouped
]);
