<?php
namespace App\model;
use PDO;
session_start();

class authentification
{
    public function login($email, $password){
        $checkLog=Connection::connect()->prepare('SELECT * FROM user WHERE email = :email');
        $checkLog->bindParam(':email', $email);
        $checkLog->execute();
        $row = $checkLog->fetch(PDO::FETCH_ASSOC);
    
        if ($row && password_verify($password, $row['password'])) {
            if($row['role'] === 'admin'){
                header('Location: ?route=homeadmin');
            }
            else{
                header('Location: ?route=homeauteur');
            }
            
        } 
        else {
            header('Location: ?route=login');
        }
    }


    public function inscription($username,$email,$password,$role){

        $checkUser = connection::connect()->prepare('SELECT * FROM user WHERE  email = :email');
        $checkUser->bindParam(':email',$email);
        $checkUser->execute();
        $result = $checkUser->fetch(PDO::FETCH_ASSOC);
        
        if(!$result){
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $role = "auteur";

        $inscrit =connection::connect()->prepare('INSERT INTO user(`name`, `email`, `password`,`role`) VALUES (:name, :email, :password, :role)');

        $inscrit->bindParam(':name',$username);
        $inscrit->bindParam(':email',$email);
        $inscrit->bindParam(':password',$hashPassword);
        $inscrit->bindParam(':role',$role);

        $inscrit->execute();
        echo "<script>alert('Inscription réussit');</script>";

        }
        else{
            echo "<script>alert('Le compt déja existe');</script>";
        }
    }
}