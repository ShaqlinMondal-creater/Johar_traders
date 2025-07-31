<?php
$input = file_get_contents("php://input");

file_put_contents('debug_input.log', $input);

header('Content-Type: application/json');
echo json_encode([
    'received_raw' => $input,
    'decoded' => json_decode($input, true)
]);
