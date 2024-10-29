<?php
// register.php

require 'vendor/autoload.php';
require 'ConnectDb.php';
use Firebase\JWT\JWT;
use Dotenv\Dotenv;

header('Content-Type: application/json');

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$conn = (new ConnectDb())->getConnection();
if(isset($_POST['username']))
{
// Assume user input is sanitized and validated
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Register user
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->execute([$username, $password]);

// Generate JWT token
$secretKey = $_ENV['JWT_SECRET'];
$payload = [
    'username' => $username,
    'iat' => time(),
    'exp' => time() + 3600
];
$jwt = JWT::encode($payload, $secretKey, 'HS256');

echo json_encode(['message' => 'User registered', 'token' => $jwt]);
die();
}
echo json_encode("need post username and password");


