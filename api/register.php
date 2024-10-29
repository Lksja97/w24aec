<?php
// register.php

require 'vendor/autoload.php'; // Autoload Composer dependencies
require 'ConnectDb.php'; // Include the ConnectDb class


$conn = (new ConnectDb())->getConnection(); // Get the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $username = $data['username'];
    $password = password_hash($data['password'], PASSWORD_BCRYPT); // Hash the password

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $password])) {
        echo json_encode(['message' => 'User registered successfully']);
    } else {
        echo json_encode(['message' => 'User registration failed']);
    }
}
