<?php

namespace App\controller;
use App\model\category;

class HomeAdminController
{
    public function adminHome(){
        require(__DIR__ .'../../../views/admin/homeadmin.php');
    }


    public function addPage(){
        require(__DIR__ .'../../../views/admin/homeaddcategory.php');
    }



    public function addTages(){
        require(__DIR__ .'../../../views/admin/addTages.php');
    }


////////////////////////////////// Category ///////////////////////////////////////////
    

    public function getCategories(){
        $getCt=new category();
        $category = $getCt->getCategory();
        require(__DIR__ .'../../../views/admin/homeaddcategory.php');
    }
    
    public function addCategory(){

    }
}