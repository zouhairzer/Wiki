<?php
namespace App\model;
use PDO;

class category 
{
    public function getCategory(){
        
        $category = connection::connect()->prepare("SELECT * FROM categories");
        $category->execute();
        return $category->fetchAll();
    }
    
    public function addCategory($nom){
        
        $category = connection::connect()->prepare("INSERT INTO `categories`(`nom`) VALUES (:nom)");
        $category->bindParam(':nom', $nom);
        $category->execute();
    }


    public function deleteCategory($id){
        
        $delete = connection::connect()->prepare("DELETE FROM `categories` WHERE id = :id");
        $delete->bindParam(':id', $id);
        $delete->execute();
    }


    public function updateCategory($id){
        
        $category = connection::connect()->prepare("SELECT * FROM categories WHERE id = :id");
        $category->bindParam(':id', $id);
        $category->execute();
    }


}