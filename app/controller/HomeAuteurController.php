<?php
namespace App\controller;

class HomeAuteurController
{
    public function autHome(){
        require(__DIR__ .'../../../views/auteur/homeauteur.php');
    }
    public function addWiki(){
        require(__DIR__ .'../../../views/auteur/addWiki.php');
    }
}