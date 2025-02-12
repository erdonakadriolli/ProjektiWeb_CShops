<?php
include '../db.php';

if (!isset($_GET["query"]) || empty(trim($_GET["query"]))) {
    exit;
}

$search_query = "%" . trim($_GET["query"]) . "%";

try {
    $stmt = $pdo->prepare("SELECT * FROM ProductDetails WHERE ProductName LIKE ? LIMIT 5");
    $stmt->execute([$search_query]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($products) > 0) {
        foreach ($products as $product) {
            echo "<a href='productdetails.php?id=" . $product["ProductID"] . "'>
                    <div class='search-info'>
                        <span>" . htmlspecialchars($product["ProductName"]) . "</span>
                        <span class='price'>$" . number_format($product["ProductPrice"], 2) . "</span>
                    </div>
                    <img src='" . htmlspecialchars($product["ProductImage"]) . "' alt='Product Image'>
                  </a>";
        }
    } else {
        echo "<a>No results found</a>";
    }
} catch (PDOException $e) {
    die("Error fetching search results: " . $e->getMessage());
}
?>
