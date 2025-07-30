<?php
// Include database connection
include('../../../connection/db_connect.php'); // Correct your path

header('Content-Type: application/json');

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

// Generate slug based on product name
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

// Check if the generated slug exists in the database
$query = "SELECT COUNT(*) AS total FROM products WHERE slug = :slug";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':slug', $slug);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// If the slug already exists, append a random 8-character string
if ($result['total'] > 0) {
    $slug .= '-' . substr(md5(uniqid(rand(), true)), 0, 8); // Append random string to make it unique
}

// Start a transaction
$pdo->beginTransaction();

try {
    // Insert product into the products table
    $query = "INSERT INTO products (sku, name, image_link, description, unit_price, category_id, brand_id, published, 
                unit, weight, tax, tax_type, meta_title, meta_description, min_qty, discount, discount_type, 
                cash_on_delivery, wa_keyword, features, slug)
              VALUES (:sku, :name, :image_link, :description, :unit_price, :category_id, :brand_id, :published, 
                      :unit, :weight, :tax, :tax_type, :meta_title, :meta_description, :min_qty, :discount, 
                      :discount_type, :cash_on_delivery, :wa_keyword, :features, :slug)";

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

    $stmt->execute();
    $product_id = $pdo->lastInsertId();  // Get the last inserted product ID

    // Insert product categories (if any)
    if ($category_id) {
        $query_category = "INSERT INTO product_categories (product_id, category_id) VALUES (:product_id, :category_id)";
        $stmt_category = $pdo->prepare($query_category);
        $stmt_category->bindValue(':product_id', $product_id);
        $stmt_category->bindValue(':category_id', $category_id);
        $stmt_category->execute();
    }

    // Commit the transaction
    $pdo->commit();

    // Prepare response
    $response = [
        'status' => 'success',
        'message' => 'Product created successfully',
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
    echo json_encode(['status' => 'error', 'message' => 'Error creating product: ' . $e->getMessage()]);
}
?>
