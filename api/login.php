<?php
require 'vendor/autoload.php'; // Autoload Composer dependencies
require 'ConnectDb.php'; // Include the ConnectDb class
use Firebase\JWT\JWT;
header('Content-Type: application/json');

$conn = (new ConnectDb())->getConnection(); // Get the database connection
$secretKey = 'your_secret_key'; // Change this to a strong secret key

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //$data = json_decode(file_get_contents('php://input'), true);
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['PASSWORD'])) {
        // Generate JWT token
        $payload = [
            'id' => $user['id'],
            'username' => $user['username'],
            'iat' => time(), // Issued at
            'exp' => time() + 3600 // Expiration time (1 hour)
        ];
        
        $token = JWT::encode($payload, $secretKey, 'HS256');
        echo json_encode(['token' => $token]);
    } else {
        echo json_encode(['message' => 'Invalid credentials']);
    }
}
