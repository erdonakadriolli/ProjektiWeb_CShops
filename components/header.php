<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="container-2 header-container">
    <a href="index.php"> <h1>EY.SHOP</h1> </a>

    <a href="onsale.php">On Sale</a>
    <a href="productlist.php">Catalog</a>
    <a href="brand.php">Brands</a>

    <div class="search-container">
        <input id="search-1" type="text" name="query" placeholder="Search for products..." onkeyup="searchProducts(this.value)">
        <div id="search-results" class="search-dropdown"></div>
    </div>

    <a id="img-1" href="cart.php">
        <img src="../styles/images/shopping-cart.png" alt="Cart">
    </a>

    <?php if (isset($_SESSION["username"])): ?>
        <span>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</span>

        <?php if ($_SESSION["role"] == "admin"): ?>
            <a href="../pages/dashboard.php">
                <button style="margin-left: 10px; background: #007bff; color: white; padding: 5px 10px; border: none; cursor: pointer;">Dashboard</button>
            </a>
        <?php endif; ?>

        <form action="../pages/logout.php" method="POST" style="display: inline;">
            <button type="submit" style="margin-left: 10px; background: red; color: white; padding: 5px 10px; border: none; cursor: pointer;">Logout</button>
        </form>

    <?php else: ?>
        <a id="img-2" href="../pages/login.php">
            <img src="../styles/images/user.png" alt="Login">
        </a>
    <?php endif; ?>
</div>
<script>
    function searchProducts(query) {
        if (query.length < 2) { 
            document.getElementById('search-results').innerHTML = "";
            return;
        }

        let xhr = new XMLHttpRequest();
        xhr.open("GET", "../pages/live_search.php?query=" + query, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('search-results').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
</script>

<style>
    .search-container {
        position: relative;
        display: inline-block;
    }
    .search-dropdown {
        position: absolute;
        background: white;
        width: 100%;
        border: 1px solid #ccc;
        max-height: 250px;
        overflow-y: auto;
        z-index: 1000;
    }
    .search-dropdown a {
        display: flex;
        align-items: center;
        padding: 8px;
        text-decoration: none;
        color: black;
        border-bottom: 1px solid #ddd;
    }
    .search-dropdown a:hover {
        background: #f0f0f0;
    }
    .search-dropdown img {
        width: 40px;
        height: 40px;
        object-fit: cover;
        margin-left: auto;
        border-radius: 5px;
    }
    .search-info {
        display: flex;
        flex-direction: column;
        font-size: 12px;
    }
    .search-info span {
        font-size: 14px;
        font-weight: bold;
    }
    .search-info .price {
        color: green;
        font-size: 12px;
    }
</style>
