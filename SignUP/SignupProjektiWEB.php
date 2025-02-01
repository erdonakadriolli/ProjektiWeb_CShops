<?php
session_start();
require_once 'config/database.php'; // Këtu lidhemi me databazën

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Merr të dhënat nga forma
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash fjalëkalimi

    // Kontrollo nëse emaili ekziston
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Ky email është i regjistruar tashmë.";
    } else {
        // Shto përdoruesin në databazë
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')");
        $stmt->bind_param("sss", $fullName, $email, $password);
        
        if ($stmt->execute()) {
            echo "Llogaria u krijua me sukses!";
            // Mund të redirect në një faqe tjetër ose të shfaqësh një mesazh
            header("Location: index.php"); // Redirect në faqen kryesore
            exit();
        } else {
            echo "Ka ndodhur një gabim gjatë regjistrimit.";
        }
    }
    $stmt->close();
}
?>