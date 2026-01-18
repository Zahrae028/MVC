<?php

require_once __DIR__ . '/../Controllers/AuthController.php';

class Router
{
    public function dispatch($path, $method)
    {
        // Show login page
        if ($path === '/login' && $method === 'GET') {
            (new AuthController())->showLogin();
            return;
        }

        // Handle login form submission
        if ($path === '/login' && $method === 'POST') {
            (new AuthController())->login();
            return;
        }

        // Simple test dashboard route
        if ($path === '/admin/dashboard') {
            echo "DASHBOARD WORKS";
            return;
        }

        // 404 fallback
        http_response_code(404);
        echo "404 NOT FOUND";
    }
}
