<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

include 'db.php';

try {
    $stmt = $pdo->prepare("SELECT * FROM cart");
    $stmt->execute();
    $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($cart);
} catch (PDOException $e) {
    echo json_encode(["error" => "Database error: " . $e->getMessage()]);
    exit();
}
?>
