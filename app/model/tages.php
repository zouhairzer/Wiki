<?php
namespace App\model;
use PDO;

class tages
{
    public function addTage($nom){
        $tages = connection::connect()->prepare("INSERT INTO `tages` (`name`) VALUES (:nom)");
        $tages->bindParam(':nom', $nom);
        $tages->execute();
    }

    public function getTage(){
        
        $tages = connection::connect()->prepare("SELECT * FROM tages");
        $tages->execute();
        return $tages->fetchAll();
    }

    public function deletetage($id){
        
        $deleteTage = connection::connect()->prepare("DELETE FROM `tages` WHERE id = :id");
        $deleteTage->bindParam(':id', $id);
        $deleteTage->execute();
    }


    public function fetchTage($id){
        $tages = connection::connect()->prepare("SELECT * FROM tages WHERE id = :id");
        $tages->bindParam(':id', $id);
        $tages->execute();
        return $tages->fetchAll();
    }

    public function UpdateTage($id,$nom){
        $tages = connection::connect()->prepare("UPDATE tages SET name = :nom WHERE id = :id");
        $tages->bindParam(':id', $id);
        $tages->bindParam(':nom', $nom);
        $tages->execute();
    }
}