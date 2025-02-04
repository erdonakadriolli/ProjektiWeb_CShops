<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["product_name"]) || empty($_POST["product_name"])) {
        echo json_encode(["error" => "Product name is missing"]);
        exit();
    }

    $product_name = trim($_POST["product_name"]);
    $product_name = str_replace(["\r", "\n"], '', $product_name); 

    try {
        $stmt = $pdo->prepare("INSERT INTO cart (product_name) VALUES (?)");
        $stmt->execute([$product_name]);

        echo json_encode(["message" => "Item added to cart"]);
    } catch (PDOException $e) {
        echo json_encode(["error" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}
?>
