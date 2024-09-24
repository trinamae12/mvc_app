<?php

class HomeController extends Controller {
    public function __construct() 
    {
        session_start();

        if(!isset($_SESSION['user'])) {
            header('Location: /mvc_app/public/login');
            exit();
        }
    }

    public function index() {
        $this->view('home/index');
    }
}
