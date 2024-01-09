<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\controller\HomeController;
// use App\Controllers\LoginController;
// use App\Controllers\RegisterController;

$route = isset($_GET['route']) ? $_GET['route'] : 'authentification';

// Instantiate the controller based on the route

switch ($route) {

  case 'authentification':
    $controller = new HomeController();
    $controller->index();
  
  default:
    // Handle 404 or redirect to the default route
    header('HTTP/1.0 404 Not Found');
    exit('Page not found');

}