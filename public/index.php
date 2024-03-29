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

  case 'homeMoreInfo':
    isset($_GET['id']);
    $id = $_GET['id'];
    $controller = new HomeAuteurController();
    $controller->MoreInfos($id);
    break;

/////////////////////////  Admin   /////////////////////////////

  case 'homeadmin':
    $adminHo = new HomeAdminController();
    $adminHo->adminHome();
    break;

/////////////////////////  Admin Tages   /////////////////////////////


  case 'homeaddtages':
    $tages = new HomeAdminController();
    $tages->fetchTages();
    break;


  case 'addTages':
    $tages = new HomeAdminController();
    $tages->addTages();
    break;
    
  
  case 'deleteTage':
    isset($_GET['id']);
    $id = $_GET['id'];
    $tage = new HomeAdminController();
    $tage->deleteTages($id);
    break;

  
  case 'updateTage':
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    $tage = new HomeAdminController();
    $tage->getCaTages($id);
    }
    elseif(isset($_POST['submit'])){
      extract($_POST);
      $tage= new HomeAdminController();
      $tage->UpdateTages($id, $nom);
    }
    break;

  /////////////////////////  Admin Category  /////////////////////////////

  case 'homeaddcategory':
    $catego = new HomeAdminController();
    $catego->getCategories();
    break;

  case 'addCategory':
    $catego = new HomeAdminController();
    $catego->addCategories();
    break;

  case 'delete':
    isset($_GET['id']);
    $id = $_GET['id'];
    $category = new HomeAdminController();
    $category->deleteCategories($id);
    break;


  case 'updateCategory':
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    $category = new HomeAdminController();
    $category->fetchCategories();
    }
    elseif(isset($_POST['submit'])){
      extract($_POST);
      $category = new HomeAdminController();
      $category->UpdateCategories($id, $nom);
    }
    break;

///////////////////////// Auteur //////////////////////////////


  case 'homeauteur':
    $auteurHo = new HomeAuteurController();
    $auteurHo->autHome();
  break;  

  case 'addWiki':
    $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $category_id = isset($_POST['categoryID']) ? $_POST['categoryID'] : '';
    $active = 1; 
    $selectedTags = isset($_POST['Tags']) ? $_POST['Tags'] : array();

    $adminHo = new HomeAuteurController();
    $adminHo->addWikies($titre, $description, $category_id, $active , $selectedTags);
    break;

  case 'addview':
    $category = new HomeAuteurController();
    $category->addview();
    break;

  case 'deleteWikie':
    isset($_GET['id']);
    $id = $_GET['id'];
    $category = new HomeAuteurController();
    $category->archiveWikies($id);
    break;

  case 'updateWiki':
      isset($_GET['id']);
      $id = $_GET['id'];
      $check = new HomeAuteurController;
      $check->fetchWikies($id);
    
    break;

  case 'modify_wiki' : 

    $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $category_id = isset($_POST['categoryID']) ? $_POST['categoryID'] : '';
    $active = 1; 
    $selectedTags = isset($_POST['Tags']) ? $_POST['Tags'] : array();
    $wikiID = isset($_POST['wikiID']) ? $_POST['wikiID'] : '';

    $adminHo = new HomeAuteurController();
    $adminHo->update_wiki($wikiID , $titre, $description, $category_id, $active , $selectedTags);

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

///////////////////////// Search //////////////////////////////

  case 'search':
    isset($_GET['titre']);
    $check = new HomeAuteurController;
    $search = $check->search($_GET['titre']);
    break;

  default:
    // Handle 404 or redirect to the default route
    header('HTTP/1.0 404 Not Found');
    exit('Page not found');
}
