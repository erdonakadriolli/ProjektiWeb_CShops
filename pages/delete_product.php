<?php
session_start();
include '../db.php';
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    die("Access denied. You must be an admin to delete products.");
}
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: Product ID not provided.");
}

$product_id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM productdetails WHERE ProductID = ?");
    $stmt->execute([$product_id]);

    header("Location: dashboard.php?deleted=1");
    exit();
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
