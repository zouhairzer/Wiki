<?php
namespace App\controller;
use App\model\wiki;

class HomeController
{
    public function index()
    {
        $wikies = wiki::getWiki();
        require(__DIR__ .'../../../views/home.php');
    }

}
?>
