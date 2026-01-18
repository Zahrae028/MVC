<?php 

require_once __DIR__ . '/../Services/AuthService.php';

class AuthController {

    private $authService;

    public function __construct() {
        $this->authService = new AuthService();
    }

    // Show login page
    public function showLogin() {
        // Make sure folder name matches exactly
        require __DIR__ . '/../Views/login/loginpage.php';
    }

    // Handle login
    public function login() {
        session_start();

        // If you just want a simple test redirect, uncomment the next two lines
        // $_SESSION['user_id'] = 1;
        // $_SESSION['role'] = 'admin';
        // header("Location: /admin/dashboard");
        // exit;

        // Real login logic using service
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->authService->login($email, $password);

        if (!$user) {
            echo "Invalid email or password";
            return;
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on role
        header("Location: /" . $user['role'] . "/dashboard");
        exit;
    }
}

?>
