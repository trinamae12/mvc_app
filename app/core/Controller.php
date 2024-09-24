<?php

//require_once '../core/Database.php';

class Controller {
    protected $db;
    protected $dbObj;

    public function __construct()
    {
        // $this->dbObj = new Database();
        $this->db = (new Database())->connect();
        //var_dump((new Database())->connect());
    }
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model($this->db);
    }

    public function view($view, $data = []) {
        require_once '../app/views/' . $view . '.php';
    }
}
