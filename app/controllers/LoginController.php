<?php

class LoginController extends Controller {

    public function __construct()
    {
        session_start();

        if(isset($_SESSION['user'])) {
            header('Location: /mvc_app/public/');
            exit();
        }
    }
    
    public function index() {
        // Show the login form view
        $this->view('login/index');
    }

    public function authenticate() {
        // Process the login form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            var_dump($username, $password);

            // Validate input
            if (!empty($username) && !empty($password)) {
                // Load the User model
                $userModel = $this->model('User');

                // Check if the user exists and password matches
                $user = $userModel->login($username, $password);

                if ($user && password_verify($password, $user['password'])) {
                    // Authentication successful, start a session
                    $_SESSION['user'] = $user;

                    // Return success response (200 OK)
                    http_response_code(200);
                    echo json_encode(['message' => 'Login successful']);
                } else {
                    // Authentication failed, return error response
                    http_response_code(401); // Unauthorized
                    echo json_encode(['error' => 'Invalid username or password']);
                }
            } else {
                // Missing username or password
                http_response_code(400); // Bad request
                echo json_encode(['error' => 'Please fill in all fields']);
            }
        } else {
            // Method not allowed
            http_response_code(405); // Method not allowed
            echo json_encode(['error' => 'Method not allowed']);
        }
    }

    // temporary add user function here
    public function addUser() {
        // if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = 'testusername';
            $password = 'testpassword';
    
            $user = $this->model('User');

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $user->store($username, $hashedPassword);

            echo "new user added";

            //header("Location: /mvc_app/public/login");
        //}

    }
}
