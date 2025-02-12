<?php
include '../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="../styles/mainpage.css">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/productpage.css">
</head>
<body>

    <?php include '../components/header.php'; ?>

    <main>
        <?php
        if (!isset($pdo)) {
            die("Error: Database connection not established.");
        }

        try {
            $stmt = $pdo->prepare("SELECT * FROM ProductDetails");
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($products) > 0) {
                echo "<div class='product-list' style='margin-top:2%; margin-left:2%;'>";

                foreach ($products as $row) {
                    if ($row["IsOnSale"]) {
                        $price_display = "<span style='color:red;'>Sale: \$" . number_format($row["SalePrice"], 2) . "</span> 
                                          <del>\$" . number_format($row["ProductPrice"], 2) . "</del>";
                    } else {
                       
                        $price_display = "\$" . number_format($row["ProductPrice"], 2);
                    }

                    echo "<div class='product-card'>

                            <!-- Product Image -->
                            <div class='foto'>
                                <img src='" . htmlspecialchars($row["ProductImage"]) . "' alt='" . htmlspecialchars($row["ProductName"]) . "'>
                            </div>

                            <!-- Product Info -->
                            <div class='Tedhena-2'>
                                <h1>" . htmlspecialchars($row["ProductName"]) . "</h1>
                                
                                <!-- Show Brand -->
                                <p><strong>Brand:</strong> " . htmlspecialchars($row["ProductBrand"]) . "</p>

                                <!-- Price (with Sale logic) -->
                                <p><strong>Price:</strong> $price_display</p>

                                <!-- Details Button -->
                                <a href='productdetails.php?id=" . $row["ProductID"] . "'>
                                    <button>Show Details</button>
                                </a>
                            </div>
                          </div>";
                }
                echo "</div>";
            } else {
                echo "<p>No products found.</p>";
            }
        } catch (PDOException $e) {
            echo "Error fetching products: " . $e->getMessage();
        }
        ?>
    </main>
<include

<?php include '../components/foooter.php'; ?>
</body>
</html>
