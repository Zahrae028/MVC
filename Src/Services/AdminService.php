<?php
    require_once __DIR__ . "/../config/Database.php";
    require_once __DIR__ . "/../Models/User.php";
    require_once __DIR__ . "/../Repositories/UserRepository.php";
    class AdminService{
    private $userRepo;
        public function __construct() {

    $this->userRepo = new UserRepository();
}
   

    public function getAllUsers(){
        $rows = $this->userRepo->getAllUsers();

    $users = [];
    foreach ($rows as $row) {
        $users[] = new User($row['id'], $row['name'], $row['email'], $row['role_id']);
    }
        return $users;
    }


        public function addUser($username , $email , $role , $password){
            
            $newUser = new User($username , $email , $role , $password);
            $repo = $this->userRepo = new UserRepository();
            $repo->addUser($newUser);

        }

    }


?>