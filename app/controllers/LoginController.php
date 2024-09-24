<?php

class LoginController extends Controller {
    
    public function index() {
        // Show the login form view
        $this->view('login/index');
    }

    public function authenticate() {
        var_dump('Form submitted');
        // Check if form is submitted
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     $username = $_POST['username'];
        //     $password = $_POST['password'];

        //     // Load the User model
        //     $userModel = $this->model('User');

        //     // Authenticate the user
        //     $user = $userModel->login($username, $password);

        //     if ($user) {
        //         // User authenticated
        //         session_start();
        //         $_SESSION['user'] = $user;
        //         // Redirect to dashboard or home
        //         header("Location: /mvc_app/public/home");
        //     } else {
        //         // Authentication failed, redirect back to login with an error
        //         header("Location: /mvc_app/public/login?error=Invalid credentials");
        //     }
        // }
    }
}
