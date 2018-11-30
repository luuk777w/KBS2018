<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Address;
use App\Models\Orders;

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
        $vnaam = filter_var (filter_input(INPUT_POST, "vnaam"),FILTER_SANITIZE_STRING);
        $anaam = filter_var(filter_input(INPUT_POST, "anaam"),FILTER_SANITIZE_STRING);
        $tvnaam = filter_var(filter_input(INPUT_POST, "tvnaam"),FILTER_SANITIZE_STRING);
        $send = filter_var(filter_input(INPUT_POST, "send"),FILTER_SANITIZE_STRING);
        $email = filter_var(filter_input(INPUT_POST, "email"),FILTER_SANITIZE_STRING);
        $telefoonNr = filter_var(filter_input(INPUT_POST, "telefoonNr"),FILTER_SANITIZE_STRING);
        $username = filter_var(filter_input(INPUT_POST, "username"),FILTER_SANITIZE_STRING);
        $pass1 = $check->GetHash(filter_var(filter_input(INPUT_POST, "ww1"),FILTER_SANITIZE_STRING));
        $pass2 = $check->GetHash(filter_var(filter_input(INPUT_POST, "ww2"),FILTER_SANITIZE_STRING));

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
        };

        if ($data['send']==1) {

            if($pass1 != $pass2){

                $msg = "De wachtwoorden zijn niet gelijk, check deze en probeer het nog een keer.";

                return $this->view->render("register", compact("msg", 'data'));


            }

            if (!empty($vnaam) || !empty($anaam) || !empty($tvnaam) || !empty($email) || !empty($telefoonNr) || !empty($username)) {
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



            }


        }else{
            return $this->view->render("register");

        }
    }

    public function NAW()
    {

        $auth = new Auth();
        if(!$auth->isLoggedIn()){
            return $auth->error401();
        }

        $account = new Account();

        $userid = $auth->getId();

        $address = new Address();

        $data = $address->getAddressByUID($userid);
        $userdata = $account->getAccount($auth->getId());


        if($data[0]!=""){


            return $this->view->render("accountnaw",compact('userdata','data'));

        }else{

            $newNAW = true;

            return $this->view->render("accountnaw",compact('userdata','newNAW'));


        }

    }
    public function showorders(){

        $auth = new Auth();
        if(!$auth->isLoggedIn()){
            return $auth->error401();
        }
        $account = new Account();

        $uid = $auth->getId();

        $orders = new Orders();
        $allorders = $orders->showorders($uid);


        $userdata = $account->getAccount($uid);

        return $this->view->render("accountorders",compact('allorders', "userdata"));


    }

    public function addNAW($Street, $HouseNr, $PostalCode, $City){

        $auth = new Auth();
        if(!$auth->isLoggedIn()){
            return $auth->error401();
        }

        $account = new Account();
        $userid = $auth->getId();

        $uid = $account->getAccount($userid);

        $address = new Address();

        $address->addAddress($userid, 1, 0, $Street, $HouseNr, $PostalCode, $City, "Netherlands");

        return header("Location: /account/naw");
    }

    public function updateNAW(){

        $account = new Account();
        $auth = new Auth();
        $userid = $auth->getId();

        $userdata = $account->getAccount($userid);


        //Filter alle formulier input
        $code = filter_input(INPUT_POST, "code");
        $num = filter_input(INPUT_POST, "num");
        $send = filter_input(INPUT_POST, "send");


        if(!isset($code) || !isset($num) || !isset($send)){

            $msg = "Er zijn geen gegeven ingevuld probeer het nog een keer.";
            return $this->view->render("accountnaw",compact('userdata','newNAW', "msg"));


        }
        $auth = new Auth();
        if(!$auth->isLoggedIn()){
            return $auth->error401();
        }

        //de verschillende API keys voor de postcode API, hierdoor kan Rico het minder snel slopen. Om dit te doen gebruiken we iedere keer een andere API key in de request d.m.v. Random
        $apikeys = [
            0=>"ZvhZo0CPIrU7NGJIc32R6ylWtfaguTV5X2RMY2x3",
            1 => "8eWVmAyZ0c6Xxiz6tl9oz3QMeHPf9pPI8Ynvrxtj",
            2 => "FV23JYHSMqY0hNtMeaAF2tBAb65Atff3D7a0EfSh",
            3 => "58fLSDFCb456RtpZcxtc03vBqHtu4Lxo6d5VV6n1",
            4 => "GewGXSKsja96pmOZxuoN0auDeZ2jSCdI3pqliBK2",
            5 => "GUNxZfLHhu2uysTdQjwPZ8xwoksgHha01JvagppK",
            6 => "6uIvWUTWd96bfeWk3rke2a2aeJaWKfaQ1kwoi07I",
            7 => "70krf7hu8X2mR77IaFZBl6y1VvRoHl5G8BID0eHG"
        ];

        //Als het huisnummer 0 is doe dan dit. Als het namelijk 0 is laat de API alle addressen zien die dat Postcode hebben.
        if ($num == 0) {
            //Geef het volgede bericht door aan de view
            $msg = "Het huisnummer kan geen 0 zijn, check uw gegevens en probeer het nog eens";

            //roep de view aan
            return $this->view->render("accountnaw",compact('userdata','newNAW', "msg"));

        } else {

            //Als het formulier verzonden is d.m.v. de knop doe dan dit
            if ($send != NULL) {

                //Geef aan dat we een request willen doen
                $curl = curl_init();

                //Dit zijn de instellingen van de request
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.postcodeapi.nu/v2/addresses/?postcode=$code&number=$num",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "accept: application/hal+json",
                        "x-api-key: " . $apikeys[rand(0, 7)]
                    ),
                ));

                //Maak de request en geef de resultaten terug
                $response = curl_exec($curl);

                //als er een error is geef dit dan aan
                $err = curl_error($curl);

                //sluit de connectie af
                curl_close($curl);

                //Als er een error is doe dan dit
                if ($err) {
                    $msg = "cURL Error #:" . $err;

                    //check of er adres gegevens zijn, als deze er niet zijn doe dit dan
                } elseif (json_decode($response)->_embedded->addresses[0] == '') {

                    //Geef het volgede bericht door aan de view
                    $msg = "Het adres lijkt niet te bestaan, check uw gegevens en probeer het nog eens";

                    //Sla alle gegevens die zijn ingevuld op in de Data array
                    $data = array();

                    if (isset($code)) {
                        $data['code'] = $code;
                    } else {
                        $data['code'] = "";
                    };
                    if (isset($street)) {
                        $data['street'] = json_decode($response)->_embedded->addresses[0]->street;
                    } else {
                        $data['street'] = "";
                    };
                    if (isset($huisnummer)) {
                        $data['huisnummer'] = $num;
                    } else {
                        $data['huisnummer'] = "";
                    };

                    if (isset($city)) {
                        $data['city'] = json_decode($response)->_embedded->addresses[0]->city->label;
                    } else {
                        $data['city'] = "";
                    };



                    //roep de view aan
                    return $this->view->render("accountnaw",compact('userdata','msg'));


                } else {


                    $msg = "Het adres lijkt te bestaan!";

                    //Sla alle gegevens die zijn ingevuld op in de Data array
                    $data = array();

                    $street = json_decode($response)->_embedded->addresses[0]->street;
                    $city = json_decode($response)->_embedded->addresses[0]->city->label;

                    $data['code'] = $code;
                    $data['street'] = $street;
                    $data['huisnummer'] = $num;
                    $data['city'] = $city;

                    //Start de sessie en sla de Data array op in de sessie voor later gebruik
                    session_start();
                    $_SESSION['naw'] = $data;

                    $userid = $auth->getId();

                    $address = new Address();

                    $address->updateNAW($userid, 1,  $street, $num, $code, $city, "Netherlands");

                    return header("Location: /account/naw");


                }
            } else {

                return "Error geen input geleverd";

            }

        }


    }

    public function checkNAW(){

        //Filter alle formulier input
        $code = filter_input(INPUT_POST, "code");
        $num = filter_input(INPUT_POST, "num");
        $send = filter_input(INPUT_POST, "send");


        //de verschillende API keys voor de postcode API, hierdoor kan Rico het minder snel slopen. Om dit te doen gebruiken we iedere keer een andere API key in de request d.m.v. Random
        $apikeys = [
            0=>"ZvhZo0CPIrU7NGJIc32R6ylWtfaguTV5X2RMY2x3",
            1 => "8eWVmAyZ0c6Xxiz6tl9oz3QMeHPf9pPI8Ynvrxtj",
            2 => "FV23JYHSMqY0hNtMeaAF2tBAb65Atff3D7a0EfSh",
            3 => "58fLSDFCb456RtpZcxtc03vBqHtu4Lxo6d5VV6n1",
            4 => "GewGXSKsja96pmOZxuoN0auDeZ2jSCdI3pqliBK2",
            5 => "GUNxZfLHhu2uysTdQjwPZ8xwoksgHha01JvagppK",
            6 => "6uIvWUTWd96bfeWk3rke2a2aeJaWKfaQ1kwoi07I",
            7 => "70krf7hu8X2mR77IaFZBl6y1VvRoHl5G8BID0eHG"
        ];

        //Als het huisnummer 0 is doe dan dit. Als het namelijk 0 is laat de API alle addressen zien die dat Postcode hebben.
        if ($num == 0) {
            //Geef het volgede bericht door aan de view
            $msg = "Het huisnummer kan geen 0 zijn, check uw gegevens en probeer het nog eens";

            //roep de view aan
            return $this->view->render("accountnaw",compact('userdata','newNAW', "msg"));

        } else {

            //Als het formulier verzonden is d.m.v. de knop doe dan dit
            if ($send != NULL) {

                //Geef aan dat we een request willen doen
                $curl = curl_init();

                //Dit zijn de instellingen van de request
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.postcodeapi.nu/v2/addresses/?postcode=$code&number=$num",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "accept: application/hal+json",
                        "x-api-key: " . $apikeys[rand(0, 7)]
                    ),
                ));

                //Maak de request en geef de resultaten terug
                $response = curl_exec($curl);

                //als er een error is geef dit dan aan
                $err = curl_error($curl);

                //sluit de connectie af
                curl_close($curl);

                //Als er een error is doe dan dit
                if ($err) {
                    $msg = "cURL Error #:" . $err;

                    //check of er adres gegevens zijn, als deze er niet zijn doe dit dan
                } elseif (json_decode($response)->_embedded->addresses[0] == '') {

                    //Geef het volgede bericht door aan de view
                    $msg = "Het adres lijkt niet te bestaan, check uw gegevens en probeer het nog eens";

                    //Sla alle gegevens die zijn ingevuld op in de Data array
                    $data = array();

                    if (isset($code)) {
                        $data['code'] = $code;
                    } else {
                        $data['code'] = "";
                    };
                    if (isset($street)) {
                        $data['street'] = json_decode($response)->_embedded->addresses[0]->street;
                    } else {
                        $data['street'] = "";
                    };
                    if (isset($huisnummer)) {
                        $data['huisnummer'] = $num;
                    } else {
                        $data['huisnummer'] = "";
                    };

                    if (isset($city)) {
                        $data['city'] = json_decode($response)->_embedded->addresses[0]->city->label;
                    } else {
                        $data['city'] = "";
                    };



                    //roep de view aan
                    return $this->view->render("accountnaw",compact('userdata','msg'));


                } else {


                    $msg = "Het adres lijkt te bestaan!";

                    //Sla alle gegevens die zijn ingevuld op in de Data array
                    $data = array();

                    $street = json_decode($response)->_embedded->addresses[0]->street;
                    $city = json_decode($response)->_embedded->addresses[0]->city->label;

                    $data['code'] = $code;
                    $data['street'] = $street;
                    $data['huisnummer'] = $num;
                    $data['city'] = $city;

                    //Start de sessie en sla de Data array op in de sessie voor later gebruik
                    session_start();
                    $_SESSION['naw'] = $data;

                    $this->addNAW($street, $num, $code, $city);


                    //roep de view aan
                    return $this->view->render("accountnaw",compact('msg', "data"));
                }
            } else {

                return "Error geen input geleverd";

            }

        }
    }





}