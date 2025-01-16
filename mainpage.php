<?php
// mainpage.php

header('Content-Type: application/json');

// Simulated database for available products
$products = [
    [
        'id' => 1,
        'name' => 'Christmas Tree',
        'price' => 119.99,
        'rating' => 4,
        'image' => 'images/tre-sale-1.png'
    ],
    [
        'id' => 2,
        'name' => 'Lights Outdoor',
        'price' => 240.99,
        'rating' => 3,
        'image' => 'images/outdoorlight.png'
    ],
    [
        'id' => 3,
        'name' => 'Christmas Wreaths',
        'price' => 179.99,
        'rating' => 5,
        'image' => 'images/wreath.png'
    ],
    [
        'id' => 4,
        'name' => 'Outdoor Decorations',
        'price' => 249.99,
        'rating' => 4,
        'image' => 'images/outdoor-dec.png'
    ]
];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetching all products
    echo json_encode(['success' => true, 'products' => $products]);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simulate adding a product to the shopping cart
    $input = json_decode(file_get_contents('php://input'), true);

    $productId = $input['productId'] ?? null;

    if (!$productId || !is_numeric($productId)) {
        echo json_encode(['success' => false, 'message' => 'Invalid product ID.']);
        exit;
    }

    $product = array_filter($products, function ($p) use ($productId) {
        return $p['id'] == $productId;
    });

    if (empty($product)) {
        echo json_encode(['success' => false, 'message' => 'Product not found.']);
    } else {
        echo json_encode(['success' => true, 'message' => 'Product added to cart.', 'product' => array_values($product)[0]]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>