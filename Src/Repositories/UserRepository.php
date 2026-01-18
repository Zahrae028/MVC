<?php 

    
    class UserRepository{
    
    private $pdo;
 
    public function __construct()
    {
    
        $db = new Database("localhost", "root", "", "recruite");
        $this->pdo = $db->connection();
    }


    public function addUser($newUser){
        $stmt= $this->pdo->prepare( "INSERT INTO users (name , email , password , role) VALUES(?,?,?,?) ");
        return $stmt->execute([$newUser->username, $newUser->email, $newUser->password, $newUser->role]) ;
    }
    public function deleteUser($id){
        $stmt= $this->pdo->prepare( "DELETE FROM users WHERE id = ? ");
        $stmt->bindValue('?' , $id, PDO::PARAM_INT);
        return $stmt->execute() ;
        
    }

    // public function getAllUsers(){
    //     $stmt = $this->pdo->prepare("SELECT * FROM users");
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }

    public function findByEmail($email) {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM users WHERE email = ?"
        );
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    }

?>