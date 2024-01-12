<?php
require_once __DIR__ . '../../vendor/autoload.php';

use App\controller\HomeController;
use App\controller\authentiController;
use App\controller\HomeAdminController;
use App\controller\HomeAuteurController;


$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Instantiate the controller based on the route

switch ($route) {

  case 'home':
    $controller = new HomeController();
    $controller->index();
    break;

/////////////////////////  Admin   /////////////////////////////

  case 'homeadmin':
    $adminHo = new HomeAdminController();
    $adminHo->adminHome();
    break;
  
  case 'addTages':
    $category = new HomeAdminController();
    $category->addTages();
    break;

  case 'addCategory':
    $category = new HomeAdminController();
    $category->addCategory();
    break;

  // case 'homeaddcategory':
  //   $category = new HomeAdminController();
  //   $category->addPage();
  //   break;

  case 'homeaddcategory':
    $catego = new HomeAdminController();
    $catego->getCategories();
    break;

///////////////////////// Authentification //////////////////////////////

  case 'auteurWiki':
    $adminHo = new HomeAuteurController();
    $adminHo->autHome();
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

  case 'addWiki':
    $adminHo = new HomeAuteurController();
    $adminHo->addWiki();
    break;

  default:
    // Handle 404 or redirect to the default route
    header('HTTP/1.0 404 Not Found');
    exit('Page not found');
}
