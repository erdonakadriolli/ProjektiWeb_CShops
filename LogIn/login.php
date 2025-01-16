<?php
// login.php

header('Content-Type: application/json');

// Simulate a database of users
$users = [
    [
        'email' => 'user1@example.com',
        'password' => password_hash('password123', PASSWORD_DEFAULT) // Password is hashed
    ],
    [
        'email' => 'user2@example.com',
        'password' => password_hash('securepass', PASSWORD_DEFAULT)
    ]
];

// Check if the request is POST and JSON
if ($_SERVER['REQUEST_METHOD'] === 'POST' && 
    strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
    
    $input = json_decode(file_get_contents('php://input'), true);

    $email = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
    $password = $input['password'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
        exit;
    }

    foreach ($users as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            echo json_encode(['success' => true, 'message' => 'Login successful.']);
            exit;
        }
    }

    echo json_encode(['success' => false, 'message' => 'Invalid email or password.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
