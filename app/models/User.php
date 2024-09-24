<?php

class User {
    public $name;
    private $db;

    public function __construct($db) {
        $this->name = 'John Doe';
        $this->db = $db;
    }

    public function login($username, $password) {
        // Query to fetch user by username and password
        $sql = 'SELECT * FROM users WHERE username = :username';

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $username);

        // Execute the query
        $stmt->execute();

        // Fetch result as associative array
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ? $user : false;
    }

    function guidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
    
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    // temporary function for add here
    public function store($username, $password) {
        //var_dump($this->db);
        try {
            $generatedUuid = $this->guidv4();
            $sql = 'INSERT INTO users (uuid, username, password) VALUES (:uuid, :username, :password)';
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':uuid', $generatedUuid);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
    
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }


    }
}
