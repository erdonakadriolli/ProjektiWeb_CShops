<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["role"] = $user["role"]; 

          
            if ($user["role"] == "admin") {
                header("Location: dashboard.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            echo " Invalid username or password.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/login.css"> 
    <link rel="stylesheet" href="../styles/mainpage.css">
</head>
<body>
    <div class="hed1"><p>EY.SHOP</p></div>
<div class="dyat">
    <div class="image">
        <img src="../styles/images/login.jpg">
       
    </div>
  
    <div class="nje">
        <h1> Welcome to EY.SHOP</h1>
     <h2>Login</h2>
     <form action="login.php" method="POST">
           <label>Username:</label>
            <input type="text" name="username" required>
            <br>
            <label>Password:</label>
            <input type="password" name="password" required>
             <br>
         <button type="submit">Login</button>
     </form>
     <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</div>
<?php include '../components/foooter.php'; ?>
</body>
</html>
