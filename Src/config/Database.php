<?php

class Database
{

    private $host ;
    private $username ;
    private $password;
    private $dbname ;

    private $conn;

    public function __construct($host ,$username , $password , $dbname)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

    }

    public function connection(){

       $this->conn  = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username,$this->password);
       return $this->conn;
    }
}

$test = new Database("localhost" , "root", "" ,"recruite");
$conn = $test->connection();
// if ($conn) {
//     echo "wada7mad";
// }


?>