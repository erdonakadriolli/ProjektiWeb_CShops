<?php
include '../db.php';
include '../components/header.php';

$selected_brand = isset($_GET['brand']) ? $_GET['brand'] : '';
try {
  $brandStmt = $pdo->query("SELECT DISTINCT ProductBrand FROM ProductDetails ORDER BY ProductBrand ASC");
  $brands = $brandStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("Error fetching brands: " . $e->getMessage());
}

if ($selected_brand) {
  $stmt = $pdo->prepare("SELECT * FROM ProductDetails WHERE ProductBrand = ?");
  $stmt->execute([$selected_brand]);
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
  $stmt = $pdo->query("SELECT * FROM ProductDetails");
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products by Brand</title>
  <link rel="stylesheet" href="../styles/global.css">
  <link rel="stylesheet" href="../styles/productpage.css">
  <link rel="stylesheet" href="../styles/mainpage.css">
</head>
<body>
  <main>
    <h2>Filter by Brand</h2>
    <form action="brand.php" method="GET">
      <label for="brand">Select Brand:</label>
      <select name="brand" id="brand">
        <option value="">All Brands</option>
        <?php foreach ($brands as $b): ?>
          <option value="<?php echo htmlspecialchars($b["ProductBrand"]); ?>" <?php if ($selected_brand == $b["ProductBrand"]) echo "selected"; ?>>
            <?php echo htmlspecialchars($b["ProductBrand"]); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <button type="submit">Filter</button>
    </form>

    <div class="product-list" style="margin-top:2%; margin-left:2%;">
      <?php
      if (count($products) > 0) {
        foreach ($products as $row) {
         
          if ($row["IsOnSale"]) {
            $price_display = "<span style='color:red;'>Sale: \$" . number_format($row["SalePrice"], 2) . "</span> <del>\$" . number_format($row["ProductPrice"], 2) . "</del>";
          } else {
            $price_display = "\$" . number_format($row["ProductPrice"], 2);
          }

          echo "<div class='product-card'>
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
      } else {
        echo "<p>No products found for the selected brand.</p>";
      }
      ?>
    </div>
  </main>
  <?php include '../components/foooter.php'; ?>
</body>
</html>
