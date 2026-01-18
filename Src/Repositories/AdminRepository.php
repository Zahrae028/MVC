<?php


require_once __DIR__ . "/../config/Database.php";
class AdminRepository
{
    private $pdo;
    public function __construct()
    {
        //     $this->pdo = $pdo;
        $db = new Database("localhost", "root", "", "recruite");
        $this->pdo = $db->connection();
    }




    public function deleteUser($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ? ");
        $stmt->bindValue('?', $id, PDO::PARAM_INT);
        return $stmt->execute();

    }


    public function getAllUsers()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users");
        return $stmt->execute();
    }
}

?>