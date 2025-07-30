<?php
// Include database connection
include('../../../connection/db_connect.php'); // Correct your path

header('Content-Type: application/json');

// Get the token and role from the URL
$token = isset($_GET['token']) ? $_GET['token'] : null;
$role = isset($_GET['role']) ? $_GET['role'] : null;
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : null;  // Product ID to update

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
    echo json_encode(['status' => 'error', 'message' => 'You must be an admin to update products.']);
    exit;
}

// Get the raw POST data
$input = json_decode(file_get_contents('php://input'), true);

// Validate input data
$required_fields = [
    'sku', 'name', 'image_link', 'description', 'unit_price', 'category_id', 'brand_id', 'published'
];

foreach ($required_fields as $field) {
    if (!isset($input[$field])) {
        echo json_encode(['status' => 'error', 'message' => "Missing required field: $field"]);
        exit;
    }
}

// Extract data from the request
$sku = $input['sku'];
$name = $input['name'];
$image_link = isset($input['image_link']) ? $input['image_link'] : null;
$description = isset($input['description']) ? $input['description'] : null;
$unit_price = $input['unit_price'];
$category_id = $input['category_id'];
$brand_id = $input['brand_id'];
$published = $input['published'];
$unit = isset($input['unit']) ? $input['unit'] : 'Nos';  // Default unit 'Nos'
$weight = isset($input['weight']) ? $input['weight'] : 0.00;
$tax = isset($input['tax']) ? $input['tax'] : 0.00;
$tax_type = isset($input['tax_type']) ? $input['tax_type'] : 'percent'; // Default tax type 'percent'
$meta_title = isset($input['meta_title']) ? $input['meta_title'] : $name;  // Use name as default meta title
$meta_description = isset($input['meta_description']) ? $input['meta_description'] : '';
$min_qty = isset($input['min_qty']) ? $input['min_qty'] : 1;  // Default minimum quantity
$discount = isset($input['discount']) ? $input['discount'] : 0.00;
$discount_type = isset($input['discount_type']) ? $input['discount_type'] : 'amount';  // Default discount type 'amount'
$cash_on_delivery = isset($input['cash_on_delivery']) ? $input['cash_on_delivery'] : 0;  // Default '0' (no COD)
$wa_keyword = isset($input['wa_keyword']) ? $input['wa_keyword'] : null;
$features = isset($input['features']) ? $input['features'] : '';

// Generate slug based on product name (if name is changed)
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

// Check if the generated slug already exists for another product
$query = "SELECT COUNT(*) AS total FROM products WHERE slug = :slug AND id != :product_id";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':slug', $slug);
$stmt->bindValue(':product_id', $product_id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// If the slug already exists, append a random 8-character string
if ($result['total'] > 0) {
    $slug .= '-' . substr(md5(uniqid(rand(), true)), 0, 8); // Append random string to make it unique
}

// Start a transaction
$pdo->beginTransaction();

try {
    // Update product in the products table
    $query = "UPDATE products SET 
                sku = :sku,
                name = :name,
                image_link = :image_link,
                description = :description,
                unit_price = :unit_price,
                category_id = :category_id,
                brand_id = :brand_id,
                published = :published,
                unit = :unit,
                weight = :weight,
                tax = :tax,
                tax_type = :tax_type,
                meta_title = :meta_title,
                meta_description = :meta_description,
                min_qty = :min_qty,
                discount = :discount,
                discount_type = :discount_type,
                cash_on_delivery = :cash_on_delivery,
                wa_keyword = :wa_keyword,
                features = :features,
                slug = :slug
              WHERE id = :product_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':sku', $sku);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':image_link', $image_link);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':unit_price', $unit_price);
    $stmt->bindValue(':category_id', $category_id);
    $stmt->bindValue(':brand_id', $brand_id);
    $stmt->bindValue(':published', $published);
    $stmt->bindValue(':unit', $unit);
    $stmt->bindValue(':weight', $weight);
    $stmt->bindValue(':tax', $tax);
    $stmt->bindValue(':tax_type', $tax_type);
    $stmt->bindValue(':meta_title', $meta_title);
    $stmt->bindValue(':meta_description', $meta_description);
    $stmt->bindValue(':min_qty', $min_qty);
    $stmt->bindValue(':discount', $discount);
    $stmt->bindValue(':discount_type', $discount_type);
    $stmt->bindValue(':cash_on_delivery', $cash_on_delivery);
    $stmt->bindValue(':wa_keyword', $wa_keyword);
    $stmt->bindValue(':features', $features);
    $stmt->bindValue(':slug', $slug);
    $stmt->bindValue(':product_id', $product_id);

    $stmt->execute();

    // Commit the transaction
    $pdo->commit();

    // Prepare response
    $response = [
        'status' => 'success',
        'message' => 'Product updated successfully',
        'data' => [
            'product_id' => $product_id,
            'sku' => $sku,
            'name' => $name,
            'category_id' => $category_id,
            'brand_id' => $brand_id,
            'unit_price' => $unit_price,
            'published' => $published,
            'slug' => $slug // Include the generated slug in the response
        ]
    ];
    echo json_encode($response);
} catch (Exception $e) {
    // Rollback the transaction if there was an error
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'message' => 'Error updating product: ' . $e->getMessage()]);
}
?>
