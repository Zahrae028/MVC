<?php
session_start();

require_once __DIR__ . '/../Core/Router.php';


$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router();
$router->dispatch($path, $method);
