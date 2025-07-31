<?php
$input = json_decode(file_get_contents("php://input"), true);
$category_input = $input['category_id'] ?? '';

if (empty($category_input)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'category_id is required.'
    ]);
    exit;
}

