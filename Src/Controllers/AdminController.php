<?php 

    require_once __DIR__ . "/../Services/AdminService.php";
    require_once __DIR__ . "/../config/Database.php";

    class AdminController{

    // private $pdo ;
    private $userService;

  

    // public function __construct($pdo) {
    //     $this->pdo = $pdo;
    // }

        // public function dashboard(){
        //         $users = $this->adminModel->getAllUsers(); 
        //         require __DIR__ . '/../View/Admin/dashboard.php';
        // }

        public function deleteUser(){


        }
        public function addUser(){
            $this->userService = new AdminService();
        }


    }

?>