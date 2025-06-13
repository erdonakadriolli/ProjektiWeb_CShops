<?php
include '../db.php';

if (!isset($_GET["query"])) {
    die("No search query provided.");
}

$search_query = "%" . trim($_GET["query"]) . "%"; // Prepare query for LIKE search

try {
    $stmt = $pdo->prepare("SELECT * FROM ProductDetails WHERE ProductName LIKE ?");
    $stmt->execute([$search_query]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error searching for products: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="../styles/global.css">
</head>
<body>

    <h2>Search Results for "<?php echo htmlspecialchars($_GET["query"]); ?>"</h2>

    <?php if (count($products) > 0): ?>
        <div class="product-list">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <div class="foto">
                        <img src="<?php echo htmlspecialchars($product["ProductImage"]); ?>" alt="<?php echo htmlspecialchars($product["ProductName"]); ?>">
                    </div>
                    <div class="Tedhena-2">
                        <h1><?php echo htmlspecialchars($product["ProductName"]); ?></h1>
                        <p><?php echo htmlspecialchars($product["ProductDescription"]); ?></p>
                        <p>Price: $<?php echo number_format($product["ProductPrice"], 2); ?></p>
                        <a href="productdetails.php?id=<?php echo $product["ProductID"]; ?>">
                            <button>View Product</button>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No products found matching "<?php echo htmlspecialchars($_GET["query"]); ?>".</p>
    <?php endif; ?>

</body>
</html>
