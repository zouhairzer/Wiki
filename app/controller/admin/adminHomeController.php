<?php
namespace App\controller\admin;

class adminHomeController
{
    public function adminHome()
    {
        require(__DIR__ .'../../../views/admin/homeadmin.php');
    }
}