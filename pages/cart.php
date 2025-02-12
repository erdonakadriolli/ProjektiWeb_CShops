<?php
session_start();
include '../db.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: ../pages/login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

$stmt = $pdo->prepare("
    SELECT c.id AS cart_id, c.quantity, p.*
    FROM cart c
    JOIN ProductDetails p ON c.product_id = p.ProductID
    WHERE c.user_id = ?
");
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart</title>
  <link rel="stylesheet" href="../styles/global.css">
  <link rel="stylesheet" href="../styles/mainpage.css">
 
</head>
<body>
  <?php include '../components/header.php'; ?>
  <h2>Your Cart</h2>
  
  <?php if (count($cart_items) > 0): ?>
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Action</th>
      </tr>
      <?php
      $total = 0;
      foreach ($cart_items as $item):
        $subtotal = $item["ProductPrice"] * $item["quantity"];
        $total += $subtotal;
      ?>
      <tr>
        <td><?php echo htmlspecialchars($item["ProductName"]); ?></td>
        <td>$<?php echo number_format($item["ProductPrice"], 2); ?></td>
        <td><?php echo $item["quantity"]; ?></td>
        <td>$<?php echo number_format($subtotal, 2); ?></td>
        <td>
          <a href="remove_from_cart.php?id=<?php echo $item["cart_id"]; ?>">Remove</a>
        </td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <td colspan="3" align="right"><strong>Total:</strong></td>
        <td colspan="2">$<?php echo number_format($total, 2); ?></td>
      </tr>
    </table>
  <?php else: ?>
    <p>Your cart is empty.</p>
  <?php endif; ?>
  
  <?php include '../components/foooter.php'; ?>
</body>
</html>
