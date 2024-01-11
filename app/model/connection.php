<?php
namespace App\model;
use PDO;

class connection 
{
    private $db;

    static public function connect(){
        $db = new PDO('mysql:host=localhost;dbname=wiki','root','');
        $db->exec("set names utf8");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}