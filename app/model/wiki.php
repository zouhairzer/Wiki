<?php
namespace App\model;
use PDO;

class wiki
{

    public function addWiki($titre, $description, $category_id, $active, $imagePath , $Tags) {
        $add = connection::connect()->prepare('INSERT INTO announces (`titre`, `description`, `userID`, `categoryID`, `active`, `image`) VALUES (:titre, :description, :user_id, :category_id, :active, :imagePath)');
        $add->bindParam(':titre', $titre);
        $add->bindParam(':description', $description);
        $add->bindParam(':user_id', $_SESSION['id']);
        $add->bindParam(':category_id', $category_id);
        $add->bindParam(':active', $active);
        $add->bindParam(':imagePath', $imagePath);
        $result = $add->execute();
        if($result){
            $stmt = connection::connect()->prepare('SELECT * FROM announces ORDER BY id DESC LIMIT 1');
            $stmt->execute();            
            $check = $stmt->fetch();
            $id = $check['id'];
            // var_dump($id);
            // var_dump($Tags);
            // die();
            if($check){
                foreach($Tags As $tag){
                    $addtag = connection::connect()->prepare("INSERT INTO `tages_wiki` (`wiki_id`, `tage_id`)        
                                    VALUES (:wikiID, :tagID)");
                    $addtag->bindParam(':wikiID', $id);
                    $addtag->bindParam(':tagID', $tag);
                    $addtag->execute();  
                    
                    
                    
                }
            }
        }

    }
    
    public function archiveWiki($id){
        
        $deleteWiki = connection::connect()->prepare("UPDATE `announces` SET active = 0 WHERE id = :id");
        $deleteWiki->bindParam(':id', $id);
        $deleteWiki->execute();

    }

    static public function getWiki(){
        $stmt = connection::connect()->prepare("SELECT * FROM announces WHERE active =1 order by date desc ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

}