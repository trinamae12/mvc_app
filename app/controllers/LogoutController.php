<?php

class LogoutController extends Controller {

    public function index() {
        // Start the session
        session_start();

        // Unset all session variables
        $_SESSION = [];

        // Destroy the session
        session_destroy();

        // Redirect to the login page or homepage
        header("Location: /mvc_app/public/login");
        exit();
    }
}
