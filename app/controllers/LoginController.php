<?php

namespace App\Controllers;

use App\Models\login;
use Core\Controller;
use Core\auth;

class LoginController extends Controller
{
    //Het standaard inlog formulier
    public function index()
    {

        return $this->view->render('login');
    }

    //als er een loginpoging gedaan wordt voer dit uit
    public function check()
    {
        //start een sessie om er zo wat mee te doen
        session_start();

        //haal uit het login form de username en wachtwoord en clean deze
        $user = filter_input(INPUT_POST, "username");
        $pass = filter_input(INPUT_POST, "password");

        //instatieer de authorisatie
        $check = new auth();

        //Encrypt het wachtwoord
        $pass = $check->GetHash($pass);

        //instantieer de login check
        $checker = new login();

        //voer de check uit met de vorige gecleande gegevens
        $data = $checker->login($user, $pass);

        //als er wel data terug komt doe dan dit
        if($data[0]!=""){

            //Haal de volgende gegevens op om er een token van te maken
            $time = time();
            $ip = $_SERVER['REMOTE_ADDR'];
            $userid = $data[0]->UserID;

            //maak de token en encrypt deze
            $token = md5($userid.$time.$ip);
            $_SESSION['token']=$token;

            //sla de userid op in de sessie
            $_SESSION['user_ID']=$userid;

            //ga naar de loggedin pagina
            return $this->view->render('loggedin',compact('data'));

        //als er geen data terug komt doe dan dit
        }else {

            //zet het msg op het volgende
            $msg = "Je gegevens lijken niet te klopppen check deze";

            //ga terug naar de login form en geeft het msg bericht mee
            return $this->view->render('login', compact("msg","pass"));
        }

    }

    public function logout(){

        //unset de Token zodat de gebruiker opnieuw in moet loggen, en verwijder de sessie
        unset($_SESSION['token']);
        session_destroy();

        //ga terug naar de homepage
        return $this->view->render('home');

    }




}