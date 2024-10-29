<?php
// protected.php

require 'vendor/autoload.php';
require 'ConnectDb.php';
require 'middleware.php';

$conn = (new ConnectDb())->getConnection();
$user = authenticate();

if (!$user) {
    echo json_encode(['message' => 'Unauthorized']);
    exit;
}

echo json_encode(['message' => 'Welcome, ' . $user->username]);
