<?php

namespace App\controller;
use App\model\authentification;

class authentiController
{
    public function log(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $loged = new authentification();
            $loged->login($email, $password);
        }
        require(__DIR__ .'../../../views/login.php');
    }



    public function register(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $inscript = new authentification();
            $inscript->inscription($username,$email,$password,$role);
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            if($inscript){
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;

                header ('location:?route=login');
            }else{
                echo '<script>alert("inscription echoue");</script>';
            }
        }
        require(__DIR__ .'../../../views/register.php');
    }

}