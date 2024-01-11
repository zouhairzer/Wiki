<?php
require_once __DIR__ . '../../vendor/autoload.php';

use App\controller\HomeController;
use App\controller\authentiController;
use App\controller\admin\adminHomeController;


$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Instantiate the controller based on the route

switch ($route) {

  case 'home':
    $controller = new HomeController();
    $controller->index();
    break;

  case 'homeadmin':
    $adminHome = new adminHomeController();
    $adminHome->adminHome();
    break;

///////////////////////// Authentification //////////////////////////////
  
  case 'login':
    $login = new authentiController();
    $login->log();
    break;

  case 'register':
    $login = new authentiController();
    $login->register();
    break;

  default:
    // Handle 404 or redirect to the default route
    header('HTTP/1.0 404 Not Found');
    exit('Page not found');
}
