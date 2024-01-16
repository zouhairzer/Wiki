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

    public function homeMoreInfo()
    {
        $get = new Wiki();
        $wikiesAllInfo = $get->getAllWiki() ;
        require(__DIR__ .'../../../views/admin/homeMoreInfo.php');
    }

    

}
?>
