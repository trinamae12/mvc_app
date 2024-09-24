<?php

class User {
    public $name;

    public function __construct() {
        $this->name = 'John Doe';
    }

    public function login($username, $password) {
        // Replace this with actual database logic to verify the user
        // For simplicity, let's assume the credentials are stored like this:
        $valid_username = 'admin';
        $valid_password = 'password123';

        if ($username === $valid_username && $password === $valid_password) {
            return [
                'username' => $username,
                'role' => 'admin',
            ];
        }

        // Return false if authentication fails
        return false;
    }
}
