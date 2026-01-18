<?php
require_once __DIR__ . '/../Repositories/UserRepository.php';

class AuthService {

    private $repo;

    public function __construct() {
        $this->repo = new UserRepository();
    }

    public function login($email, $password) {
        $user = $this->repo->findByEmail($email);

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user['password'])) {
            return false;
        }

        return $user;
    }
}

?>