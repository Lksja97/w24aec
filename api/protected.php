<?php
// protected.php

require 'vendor/autoload.php';
require 'ConnectDb.php';
require 'middleware.php';
header('Content-Type: application/json');

$conn = (new ConnectDb())->getConnection();
$user = authenticate();

if (!$user) {
    header("forbidden",true,403);
    echo json_encode(['message' => 'forbidden']);
    exit;
}

echo json_encode(['message' => 'Welcome, ' . $user->username]);
