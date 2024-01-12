<?php

namespace App\controller;
use App\model\category;

class HomeAdminController
{
    public function adminHome(){
        require(__DIR__ .'../../../views/admin/homeadmin.php');
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
    
    public function addCategories(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nom = $_POST['nom'];
            $addCat = new category();
            $addCat->addCategory($nom);
        }
        require(__DIR__ .'../../../views/admin/addCategory.php');
    }

    public function deleteCategories($id){
        $getCt=new category();
        $category = $getCt->deleteCategory($id);
    }

    public function updateCategories(){
        
    }
}