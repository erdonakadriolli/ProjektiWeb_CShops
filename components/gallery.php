<?php
include '../db.php';
 
$stmt = $pdo->prepare("SELECT ProductID, ProductName, ProductPrice, ProductImage FROM productdetails LIMIT 6");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="Gallery">
    <img src="../styles/images/left.png" id="pas" class="pas">

    <div class="gallery">
        <?php foreach ($products as $product): ?>
            <span class="product">
                <a href="productdetails.php?id=<?= $product['ProductID']; ?>">
                    <img style="height:300px; margin-right:20px;" src="<?= htmlspecialchars($product['ProductImage']); ?>" 
                         alt="<?= htmlspecialchars($product['ProductName']); ?>">
                </a>
                <h1 style="margin-top:10px;" class="title"><?= htmlspecialchars($product['ProductName']); ?></h1>
                <p style="margin-top:10px;" class="price">$<?= number_format($product['ProductPrice'], 2); ?></p>

                    <button style="margin-top:10px; width:200px; height:30px; background-color:rgb(216, 148, 70); font-size:20px; border-radius:8px; border:none;"><a style=" color:white; text-decoration: none;" href="productdetails.php?id=<?= $product['ProductID']; ?>" class="view-button">
                        View Details
                    </a>
                    </button>
                </span>
                
            <?php endforeach; ?>
        </div>
        <img src="../styles/images/right.png" id="para" class="para">
    </div>

   
</div>
