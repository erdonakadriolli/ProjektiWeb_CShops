<?php
session_start();
include '../db.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: ../pages/login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

try {
    $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = ?");
    $stmt->execute([$user_id]);
    header("Location: cart.php?success=1");
    exit();
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
