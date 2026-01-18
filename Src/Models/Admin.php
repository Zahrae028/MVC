<?php

    require_once __DIR__ . "/../config/Database.php";
    require_once __DIR__. "/../Models/User.php";

class Admin extends User{
    
    private $repo;

     public function __construct($name , $email , $role , $password , $repo)
    {
        parent::__construct($name , $email , $role , $password); 
        $this->repo = $repo;
    }

    public function deleteById($id){
        $this->repo->deleteUser($id);
    }

    public function getAllUsers()
    {
        return $this->repo->getAllUsers();
    }

}



?>