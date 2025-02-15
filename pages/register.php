<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $role = "client"; 

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $email, $password, $role]);

        echo "Registration successful! <a href='login.php'>Login here</a>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Error: Username or email already exists.";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/mainpage.css">
    <link rel="stylesheet" href="../styles/register.css">
</head>
<body>
    <div class="hed1"><p>EY.SHOP</p></div>
    <div class="all-1">
    <div class="image">
                <img src="../styles/images/signup.jpg">
            </div>
        <div class="forma">
            <h1>Welcome to EY.SHOP</h1>
            
            <p id="p">Register</p>
            <form action="register.php" method="POST">
                <label>Username:</label>
                <input type="text" name="username" required>
                <br>
                <label>Email:</label>
                <input type="email" name="email" required>
                <br>
                <label>Password:</label>
                <input type="password" name="password" required>
                <br>
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="login.php">LogIn here</a></p>
        </div>
            
    </div>
        <?php include '../components/foooter.php'; ?>
    </body>
    </html>
