<?php

class TestController extends Controller {

    public function index() {
        // Create an instance of the Database class
        $db = new Database();

        // Test the database connection
        $db->testConnection();
    }
}
