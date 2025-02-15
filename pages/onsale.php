<?php
include '../db.php';
include '../components/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>On Sale Products</title>
  <link rel="stylesheet" href="../styles/global.css">
  <link rel="stylesheet" href="../styles/productpage.css">
  <link rel="stylesheet" href="../styles/mainpage.css">
</head>
<body>
  <main>
    <?php
    try {
     
      $stmt = $pdo->prepare("SELECT * FROM ProductDetails WHERE IsOnSale = 1");
      $stmt->execute();
      $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if (count($products) > 0) {
        echo "<div class='product-list' style='margin-top:2%; margin-left:2%;'>";
        foreach ($products as $row) {
        
          $price_display = "<span style='color:red;'>Sale: \$" . number_format($row["SalePrice"], 2) . "</span> <del>\$" . number_format($row["ProductPrice"], 2) . "</del>";

          echo "<div class='product-card' style=' height:500px;margin-bottom: 10px'>
                  <div class='foto'>
                    <img src='" . htmlspecialchars($row["ProductImage"]) . "' alt='" . htmlspecialchars($row["ProductName"]) . "'>
                  </div>
                  <div class='Tedhena-2'>
                    <h1>" . htmlspecialchars($row["ProductName"]) . "</h1>
                    <p><strong>Brand:</strong> " . htmlspecialchars($row["ProductBrand"]) . "</p>
                    <p>" . htmlspecialchars($row["ProductDescription"]) . "</p>
                    <p><strong>Price:</strong> " . $price_display . "</p>
                    <a href='productdetails.php?id=" . $row["ProductID"] . "'>
                      <button>Show Details</button>
                    </a>
                  </div>
                </div>";
        }
        echo "</div>";
      } else {
        echo "<p>No on sale products found.</p>";
      }
    } catch (PDOException $e) {
      echo "Error fetching on sale products: " . $e->getMessage();
    }
    ?>
  </main>
  <?php include '../components/foooter.php'; ?>
</body>
</html>
