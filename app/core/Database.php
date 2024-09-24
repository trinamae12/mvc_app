<?php

class Database {
    private $host = 'localhost';  // Database host
    private $db_name = 'test';  // Database name
    private $username = 'root';  // Database username
    private $password = '';  // Database password
    private $connection;

    // Create a connection to the database
    public function connect() {
        $this->connection = null;

        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
            $this->connection = new PDO($dsn, $this->username, $this->password);
            // Set PDO error mode to exception for better error handling
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->connection;
    }

    public function testConnection() 
    {
        if($this->connect()) {
            echo "Database connection successful";
        } else {
            echo "Database connection failed";
        }
    }
}
