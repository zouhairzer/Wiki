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
}