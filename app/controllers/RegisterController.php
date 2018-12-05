<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Address;
use App\Models\Orders;

use App\Models\Account;

class RegisterController extends Controller
{

    public function index() {

        return $this->view->render("register");

    }

    public function register() {

        //instatieer de authorisatie
        $check = new Auth();

        //Filter alle formulier input
        $vnaam = filter_input(INPUT_POST, "vnaam", FILTER_SANITIZE_STRING);
        $anaam = filter_input(INPUT_POST, "anaam",FILTER_SANITIZE_STRING);
        $tvnaam = filter_input(INPUT_POST, "tvnaam",FILTER_SANITIZE_STRING);
        $send = filter_input(INPUT_POST, "send",FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email",FILTER_SANITIZE_STRING);
        $telefoonNr = filter_input(INPUT_POST, "telefoonNr",FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, "username",FILTER_SANITIZE_STRING);
        $pass1 = $check->GetHash(filter_input(INPUT_POST, "ww1",FILTER_SANITIZE_STRING));
        $pass2 = $check->GetHash(filter_input(INPUT_POST, "ww2",FILTER_SANITIZE_STRING));

        $data = array();
        if(isset($vnaam)){
            $data['vnaam']=$vnaam;
        }else {
            $data['vnaam'] = "";
        };
        if(isset($tvnaam)){
            $data['tvnaam']=$tvnaam;
        }else{
            $data['tvnaam']="";
        };
        if(isset($anaam)){
            $data['anaam']=$anaam;
        }else{
            $data['anaam']="";
        };
        if(isset($email)){
            $data['email']=$email;
        }else{
            $data['email']="";
        };
        if(isset($telefoonNr)){
            $data['telefoonNr']=$telefoonNr;
        }else{
            $data['telefoonNr']="";
        };
        if(isset($username)){
            $data['username']=$username;
        }else{
            $data['username']="";
        };
        if(isset($pass1)){
            $data['pass']= $pass1;
        }else{
            $data['pass']="";
        };
        if(isset($send)){
            $data['send']= 1;
        }

        if (!empty($vnaam) && !empty($anaam) && !empty($email) && !empty($telefoonNr) && !empty($username) && !empty($pass1) ) {
            //Start de sessie en sla de Data array op in de sessie voor later gebruik
            session_start();


            //Create account
            $newaccount = new Account();

            if(!empty($newaccount->exists($username))) {
            $msg = "De gebruikersnaam is al in gebruik, probeer het met een ander gebruikernaam.";

                return $this->view->render("register", compact("msg"));
            }

            $newaccount->CreateAccount($data);
            $usid = $newaccount->login($username,$pass1);

            $id = $usid[0]->CustomerID;


            //voer de check uit met de vorige gecleande gegevens
            $check->login($id);

            return header("Location: /account");

        }else{

            $msg = "Niet alle velden zijn ingevuld.";

            return $this->view->render("register", compact("msg"));

        }
        
    }

}