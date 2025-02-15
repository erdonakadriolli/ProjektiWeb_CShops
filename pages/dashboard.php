<?php
session_start();
include '../db.php';

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] != "admin") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/mainpage.css">
    <style>
        body {
            font-family: Arial, sans-serif;
         
        }
        .dashboard-container {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background: #333;
            color: white;
            padding: 15px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar li {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #555;
        }
        .sidebar li:hover {
            background: #555;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            background: #f4f4f4;
            min-height: 400px;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #333;
            color: white;
        }
      
        .tab-content input{
            margin-left: 100px
        }
    .product-form {
        display: flex;
        flex-direction: column;
        
        max-width: 500px;
        margin: auto; 
    }

    .form-group {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .form-group label {
        width: 150px;
        font-weight: bold;
    }

    .form-group input{
        flex-grow: 1;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }
    .form-group textarea {
        flex-grow: 1;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background: #007bff;
        color: white;
        padding: 10px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-top: 10px;
    }

    button:hover {
        background: #0056b3;
    }

    </style>
</head>
<body>

<?php include '../components/header.php'; ?>
    <h2>Welcome, Admin <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>
    
    <div class="dashboard-container">
   
        <div class="sidebar">
            <ul>
                <li onclick="openTab('create-products')">Create Products</li>
                <li onclick="openTab('product-list')">Product List</li>
                <li onclick="openTab('users-list')">Users List</li>

            </ul>
            <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>
        </div>

        
        <div class="content">
        <div id="create-products" class="tab-content active">
    <h3 style="margin-left:432px; font-size:30px">Create Products</h3>
    <form action="create_product.php" method="POST" class="product-form">
        <div class="form-group">
            <label>Product Name:</label>
            <input type="text" name="product_name" placeholder="Emri i produktit" required>
        </div>
        <div class="form-group">
            <label>Product Type:</label>
            <input type="text" name="product_type" placeholder="lloji produktit" required>
        </div>
        <div class="form-group">
            <label>Product Description:</label>
            <textarea name="product_description" placeholder="Pershkrimi produktit" required></textarea>
        </div>
        <div class="form-group">
            <label>Product Amount:</label>
            <input type="number" placeholder="Sasia produktit" name="product_amount" required>
        </div>
        <div class="form-group">
            <label>Product Price:</label>
            <input type="number" step="0.01" placeholder="Qmimi produktit" name="product_price" required>
        </div>
        <div class="form-group">
            <label>Product Image (Link):</label>
            <input type="url" name="product_image" placeholder="Foto" required>
        </div>
        <button type="submit">Create Product</button>
    </form>
</div>

            
           
            <div id="product-list" class="tab-content">
                <h3>Product List</h3>
                <table>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM ProductDetails");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td><img src='{$row["ProductImage"]}' width='50'></td>
                                <td>{$row["ProductName"]}</td>
                                <td>{$row["ProductType"]}</td>
                                <td>{$row["ProductDescription"]}</td>
                                <td>{$row["ProductAmount"]}</td>s
                                <td>\${$row["ProductPrice"]}</td>
                                <td>
                                    <a href='edit_product.php?id={$row["ProductID"]}'>Edit</a> |
                                    <a href='delete_product.php?id={$row["ProductID"]}'>Delete</a>
                                </td>
                              </tr>";
                    }
                    ?>
                </table>
            </div>

       
            <div id="users-list" class="tab-content">
                <h3>Users List</h3>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM users");
                    while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td>{$user["id"]}</td>
                                <td>{$user["username"]}</td>
                                <td>{$user["email"]}</td>
                                <td>{$user["role"]}</td>
                              </tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
           
    </div>

   
    
    <?php include '../components/foooter.php'; ?>
    <script>
        function openTab(tabId) {
            let contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => content.classList.remove('active'));

            document.getElementById(tabId).classList.add('active');
        }
    </script>

</body>
</html>
