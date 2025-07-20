<?php
require_once '../config/config.php';
require_once '../core/Controller.php';
require_once '../core/Model.php';
require_once '../core/View.php';

session_start();

// Simple router
$controller = $_GET['controller'] ?? 'auth';
$action = $_GET['action'] ?? 'login';

$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = "../app/controllers/{$controllerName}.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $ctrl = new $controllerName();
    if (method_exists($ctrl, $action)) {
        $ctrl->$action();
        exit;
    }
}

http_response_code(404);
echo "Página no encontrada";