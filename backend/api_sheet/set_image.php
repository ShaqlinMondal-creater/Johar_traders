<?php
// $mysqli = new mysqli("localhost", "root", "", "jt_local"); // For Local
$mysqli = new mysqli("localhost", "jt_laravel", "7s4^d2Cq1", "jt_laravel"); // // For Live

// Fetch all products
$result = $mysqli->query("SELECT id, image_link FROM products");

while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $links = explode(',', $row['image_link']);
    $filenames = array_map(function($url) {
        $url = trim($url);
        return basename(parse_url($url, PHP_URL_PATH));
    }, $links);

    $photoStr = implode(', ', $filenames);
    $photoStr = $mysqli->real_escape_string($photoStr);

    // Update the row
    $mysqli->query("UPDATE products SET photos = '$photoStr' WHERE id = $id");
}

echo "Updated photos column for all products.";
?>
