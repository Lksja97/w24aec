<?php
// middleware.php

require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
header('Content-Type: application/json');

function authenticate() {
    $secretKey = $_ENV['JWT_SECRET'];
    $headers = getallheaders();
    if (isset($headers['Authorization'])) {
        $jwt = str_replace('Bearer ', '', $headers['Authorization']);
        try {
            $decoded = JWT::decode($jwt, new Key($secretKey, 'HS256'));
            return $decoded; // Return user data
        } catch (Exception $e) {
            return null; // Invalid token
        }
    }
    return null; // No token
}
