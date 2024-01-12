<?php
namespace App\model;

class wiki
{

    public function addWiki($titre, $description){

        $add=connection::connect()->prepare('INSERT INTO announces(`titre`,`description`) VALUES (:titre, :description)');
        $add->bindParam(':titre', $titre);
        $add->bindParam(':description', $description);
        $add->execute();
    }

    static public function getWiki(){
        $stmt = connection::connect()->prepare("SELECT * FROM announces WHERE active =0");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}