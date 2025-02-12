<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product_id"])) {
    if (!isset($_SESSION["user_id"])) {
        header("Location: ../pages/login.php");
        exit();
    }
    
    $user_id = $_SESSION["user_id"];
    $product_id = intval($_POST["product_id"]);
    $quantity = isset($_POST["quantity"]) ? intval($_POST["quantity"]) : 1;

    $stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
    $stmt->execute([$user_id, $product_id]);
    $existing = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existing) {
        $new_quantity = $existing["quantity"] + $quantity;
        $stmt = $pdo->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
        $stmt->execute([$new_quantity, $existing["id"]]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $product_id, $quantity]);
    }
    
    header("Location: ../pages/cart.php");
    exit();
} else {
    header("Location: ../pages/productlist.php");
    exit();
}
?>
