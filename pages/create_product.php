<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO ProductDetails (ProductName, ProductType, ProductDescription, ProductAmount, ProductPrice, ProductImage)
                           VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST["product_name"],
        $_POST["product_type"],
        $_POST["product_description"],
        $_POST["product_amount"],
        $_POST["product_price"],
        $_POST["product_image"]
    ]);
}

header("Location: dashboard.php");
exit();
?>
