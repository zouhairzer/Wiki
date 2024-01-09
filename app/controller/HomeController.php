<?php
namespace App\controller;
use App\model\UserModel;

class HomeController
{
    public function index()
    {
        require(__DIR__ .'../../../views/authentification.php');
    }
}
?>
