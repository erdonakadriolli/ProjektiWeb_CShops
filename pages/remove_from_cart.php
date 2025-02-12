<?php
session_start();
include '../db.php';


if (!isset($_SESSION["user_id"])) {
    header("Location: ../pages/login.php");
    exit();
}

if (isset($_GET["id"])) {
    $cart_id = intval($_GET["id"]);
    
    $stmt = $pdo->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
    $stmt->execute([$cart_id, $_SESSION["user_id"]]);
}

header("Location: ../pages/cart.php");
exit();
?>
