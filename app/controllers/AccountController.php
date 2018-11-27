<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Account;

class AccountController extends Controller
{

    public function index(){

        $auth = new Auth();
        if(!$auth->isLoggedIn()){
            return $auth->error401();
        }

        $account = new Account();

        $data = $account->getAccount($auth->getId());

        return $this->view->render("account", compact("data"));

    }


    public function register()
    {

        //instatieer de authorisatie
        $check = new Auth();

        //Filter alle formulier input
        $vnaam = filter_input(INPUT_POST, "vnaam");
        $anaam = filter_input(INPUT_POST, "anaam");
        $tvnaam = filter_input(INPUT_POST, "tvnaam");
        $send = filter_input(INPUT_POST, "send");
        $email = filter_input(INPUT_POST, "email");
        $telefoonNr = filter_input(INPUT_POST, "telefoonNr");
        $username = filter_input(INPUT_POST, "username");
        $pass1 = $check->GetHash(filter_input(INPUT_POST, "ww1"));
        $pass2 = $check->GetHash(filter_input(INPUT_POST, "ww2"));

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
        }else{
            $data['send']=0;
        };

        var_dump($data);

        if ($data['send']==1) {

            if($pass1 != $pass2){

                $msg = "De wachtwoorden zijn niet gelijk, check deze en probeer het nog een keer.";

                return $this->view->render("register", compact("msg", 'data'));


            }

            if (!empty($vnaam) || !empty($anaam) || !empty($tvnaam) || !empty($email) || !empty($telefoonNr) || !empty($username)) {
                //Start de sessie en sla de Data array op in de sessie voor later gebruik
                session_start();


                //Create account
                $auth = new Auth();
                $account = new Account();

                $account->CreateAccount($data);

                //roep de view aan
                $data = $account->getAccount($auth->getId());

                return $this->view->render("account", compact("data"));


            }else{

                //Start de sessie en sla de Data array op in de sessie voor later gebruik
                session_start();
                $_SESSION['naw'] = $data;

                $msg = "Niet alle gegevens zijn ingevuld, probeer het nog een keer";

                //roep de view aan
                return $this->view->render("register", compact("msg", "data"));

            }


        }else{
            return $this->view->render("register");

        }
    }


}