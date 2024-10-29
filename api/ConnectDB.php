<?php
// ConnectDb.php

class ConnectDb {
    private $host = 'localhost';
    private $dbname = 'user_auth';
    private $username = 'your_db_username'; // Change this to your DB username
    private $password = 'your_db_password'; // Change this to your DB password
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo json_encode(['message' => 'Database connection failed: ' . $e->getMessage()]);
            exit;
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
