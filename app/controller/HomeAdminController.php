<?php

namespace App\controller;
use App\model\category;
use App\model\tages;

class HomeAdminController
{
    public function adminHome(){
        require(__DIR__ .'../../../views/admin/homeadmin.php');
    }

////////////////////////////////// Tages ///////////////////////////////////////////
    public function addTages(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nom = $_POST['nom'];
            $addTage = new tages();
            $addTage->addTage($nom);
            // dump($addTage);
        }
        require(__DIR__ .'../../../views/admin/addTages.php');
    }


    public function fetchTages(){
        $fetchtage = new tages();
        $tages=$fetchtage->getTage();
        require(__DIR__ .'../../../views/admin/homeaddtages.php');
    }
    

    public function deleteTages($id){
        
        $delet=new tages();
        $tages = $delet->deletetage($id);

        header("location:?route=homeaddtages");
    }

    public function getCaTages($id){
        $fetch=new tages();
        $fetchTage=$fetch->fetchTage($id); 
        require(__DIR__ .'../../../views/admin/updateTage.php');
    }

    public function updateTages($id, $nom){
        $update=new tages();;
        $update->UpdateTage($id,$nom);
        header("location:?route=homeaddtages"); 
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

        header("location:?route=homeaddcategory");
        
    }

    public function fetchCategories($id){
        $fetch=new category();
        $fetchCat=$fetch->fetchCategory($id); 
        require(__DIR__ .'../../../views/admin/updateCategory.php');
    }

    public function updateCategories($id, $nom){
        $update=new category();
        $update->UpdateCategory($id, $nom);
        header("location:?route=homeaddcategory"); 
    }
}