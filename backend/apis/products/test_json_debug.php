<?php
header('Content-Type: application/json');

$raw = file_get_contents("php://input");
$headers = getallheaders();

echo json_encode([
    'method' => $_SERVER['REQUEST_METHOD'],
    'content_type' => $headers['Content-Type'] ?? 'none',
    'raw' => $raw,
    'parsed' => json_decode($raw, true)
]);
