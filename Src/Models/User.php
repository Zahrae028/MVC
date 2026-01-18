<?php

require_once __DIR__ . "../config/Database.php";
class User{

    private $id;
    private $name;
    private $email;
    private $role ;
    private $password;


    public function __construct($name , $email , $role , $password ) {

        $this->name = $name ;
        $this->email = $email ;
        $this->role = $role ;
        $this->password = $password ;
        
    }

    public function getName(){
        return $this->name ;
    }
    public function getEmail(){
        return $this->email ;
    }
    public function getRole(){
        return $this->role ;
    }
    public function getPassword(){
        return $this->password ;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function setRole($role){
        $this->role = $role;
    }
    public function setPassword($password){
        $this->password = $password;
    }



}

?>