<?php
include '../db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid product ID.");
}

$product_id = intval($_GET['id']);

try {
    $stmt = $pdo->prepare("SELECT * FROM ProductDetails WHERE ProductID = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        die("Product not found.");
    }
} catch (PDOException $e) {
    die("Error fetching product details: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product["ProductName"]); ?> - Details</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/productpage.css">
    <link rel="stylesheet" href="../styles/productdetail.css">
</head>
<body>

    <?php include '../components/header.php'; ?>

    <main class="product-details">
        <div class="product-container">
            <img src="<?php echo htmlspecialchars($product["ProductImage"]); ?>" alt="<?php echo htmlspecialchars($product["ProductName"]); ?>">
            <div class="product-info">
                <h1><?php echo htmlspecialchars($product["ProductName"]); ?></h1>
                <p><?php echo htmlspecialchars($product["ProductType"]); ?> </p>
                <p><?php echo htmlspecialchars($product["ProductDescription"]); ?></p>
                <h3><?php echo htmlspecialchars($product["EstimatedArrival"]); ?></h3>
                <p><strong>Price: $<?php echo number_format($product["ProductPrice"], 2); ?></strong></p>
                <form action="addtocart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product["ProductID"]; ?>">
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
        </div>
    </main>

    <?php include '../components/footer.php'; ?>

</body>
</html>
