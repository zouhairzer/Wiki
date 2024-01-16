<?php
namespace App\controller;
session_start();
use App\model\wiki;
use App\model\category;
use App\model\tages;

class HomeAuteurController
{
    public function autHome(){
        $wikies = wiki::getWiki();
        require(__DIR__ .'../../../views/auteur/homeauteur.php');
    }



    public function addWikies($titre, $description, $category_id, $active ,$Tags) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
            $directory = "assets/img/";
            $name = $_FILES["image"]["name"];
            $path = $directory . $name;
            $fileType = pathinfo($path, PATHINFO_EXTENSION);
            $allowedExtensions = array("jpg", "jpeg", "png", "gif", "svg");
    
            if (in_array($fileType, $allowedExtensions) && $_FILES["image"]["error"] == 0 && $_FILES["image"]["size"] > 0) {
                move_uploaded_file($_FILES["image"]["tmp_name"], $path);

                $addWiki = new Wiki();
                $addWiki->addWiki($titre, $description,  $category_id, $active, $path ,$Tags);
            } else {
                echo "Error uploading file.";
            }
        }
        $wikies = wiki::getWiki();
        require(__DIR__ . '../../../views/auteur/homeauteur.php');
    }





    public function update_wiki($wikiID, $titre, $description, $category_id, $active, $Tags) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $directory = "assets/img/";
            $name = $_FILES["image"]["name"];
            $path = $directory . $name;
            $fileType = pathinfo($path, PATHINFO_EXTENSION);
            $allowedExtensions = array("jpg", "jpeg", "png", "gif", "svg");
    
            // File validation
            if (in_array($fileType, $allowedExtensions) && $_FILES["image"]["error"] == 0 && $_FILES["image"]["size"] > 0) {
                move_uploaded_file($_FILES["image"]["tmp_name"], $path);
    
                // Use prepared statements to prevent SQL injection
                $addWiki = new Wiki();
                $addWiki->Update_Wiki_model($wikiID, $titre, $description, $category_id, $active, $path, $Tags);
                
                // Output for debugging (remove in production)
                // dump($wikiID, $titre, $description, $category_id, $active, $path, $Tags);
            } else {
                // Handle file upload error
                echo "Error uploading file.";
            }
        }
    
        header("location:?route=homeauteur");
    }
    



    public function archiveWikies($id){
        
        $delete=new wiki();
        $wiki = $delete->archiveWiki($id);

        header("location:?route=homeauteur");
    }



    public function addview()
    {
        $categorie = new Category();
        $categories = $categorie->getCategory();

        $getTags = new tages();
        $resultTags = $getTags->getTage();

        require(__DIR__ . '../../../views/auteur/addWiki.php');
    }




    public function search($titre){
        $search = new wiki();
        $results = $search->searchWikies($titre);
        require(__DIR__ . '../../../views/auteur/search.php');
    }




    public function fetchWikies($id){
        $categorie = new Category();
        $categories = $categorie->getCategory();
        
        $wikies = wiki::getWikiByID($id);
        
        $getTags = new tages();
        $resultTags = $getTags->getTage();
        require(__DIR__ . '../../../views/auteur/updateWiki.php');
    }



    public function updateWikies($wikiID, $titre, $description, $category_id, $active, $imagePath, $Tags){
        $updateWiki=new wiki();
        $result = $updateWiki->UpdateWiki($wikiID, $titre, $description, $category_id, $active, $imagePath, $Tags);
        header("location:?route=homeauteur"); 
    }

    public function MoreInfos($id){
       $moreInfo = new wiki();
      $moreInfoWiki = $moreInfo->MoreInfo($id);
      require(__DIR__ . '../../../views/admin/homeMoreInfo.php');
    }
    
}