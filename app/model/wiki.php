<?php
namespace App\model;
use App\model\tages;
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


    public function Update_Wiki_model($wikiID, $titre, $description, $category_id, $active, $imagePath, $Tags)
    {
        $add = connection::connect()->prepare('UPDATE announces
                                                SET
                                                `titre` = :titre,
                                                `description` = :description,
                                                `categoryID` = :category_id,
                                                `active` = :active,
                                                `image` = :imagePath
                                                WHERE id  = :wikiID');
    
        $add->bindParam(':titre', $titre);
        $add->bindParam(':description', $description);
        $add->bindParam(':category_id', $category_id);
        $add->bindParam(':active', $active);
        $add->bindParam(':imagePath', $imagePath);
        $add->bindParam(':wikiID', $wikiID);
    
        $result = $add->execute();
    
        if ($result) {
            $deleteTags = connection::connect()->prepare('DELETE FROM `tages_wiki` WHERE  wiki_id  = :wikiID');
            $deleteTags->bindParam(':wikiID', $wikiID); // Fix: Use $deleteTags instead of $addtag
            $deleteTags->execute();
    
            if ($result) {
                foreach ($Tags as $tag) {
                    $addtag = connection::connect()->prepare("INSERT INTO `tages_wiki` (`wiki_id`, `tage_id`)        
                                        VALUES (:wikiID, :tagID)");
                    $addtag->bindParam(':wikiID', $wikiID);
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


    static public function getWikiByID($id){
        $stmt = connection::connect()->prepare("SELECT * FROM announces WHERE id = :id order by date desc ");
        $stmt->bindParam(':id'  , $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function searchWikies($title){
     if (!empty($title)){ 
        $stmt = connection::connect()->prepare("SELECT announces.titre titre , announces.description description ,announces.date date, announces.image image , categories.nom categories, tages.name tages  FROM announces 
        LEFT JOIN categories on announces.categoryID = categories.id 
        LEFT JOIN tages_wiki ON tages_wiki.wiki_id = announces.id 
        LEFT JOIN tages ON tages_wiki.tage_id  = tages.id
        WHERE announces.titre LIKE :wiki 
        OR tages.name like :tag 
        OR categories.nom LIKE :ctgr
        GROUP BY announces.id ORDER BY announces.id DESC ;");
        $titre1 = "%$title%";     
        $stmt->bindParam(':wiki', $titre1);
        $stmt->bindParam(':tag', $titre1);
        $stmt->bindParam(':ctgr', $titre1);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
        }
        else {
            $result = $this->getWiki();
            return $result;
        }
    }


    public function getAllWiki(){
        
        $getWiki = connection::connect()->prepare("SELECT * FROM tages_wiki JOIN tages ON tages_wiki.tage_id = tages.id JOIN announces ON tages.id = announces.id JOIN categories ON categories.id = tages_wiki.categorie_id");
        $getWiki->execute();
        $results = $getWiki->fetchAll(PDO::FETCH_ASSOC);
        // dump($results);
        return $results;
    }



   
        public function MoreInfo($id){
            $stmt = connection::connect()->prepare("SELECT announces.titre titre , announces.description description ,
                                                    announces.date date, 
                                                    announces.image image , 
                                                    categories.nom categories, 
                                                    tages.name tages  FROM announces 
                                                    LEFT JOIN categories on announces.categoryID = categories.id 
                                                    LEFT JOIN tages_wiki ON tages_wiki.wiki_id = announces.id 
                                                    LEFT JOIN tages ON tages_wiki.tage_id  = tages.id 
                                                    WHERE announces.id = :id ;");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $MoreInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $MoreInfo;
        }
}