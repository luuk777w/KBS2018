<?php


namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Account;


class PostalController extends Controller
{
    //Laat de check pagina zien zonder dat iets is ingevuld
    public function index(){

        $check = new Auth();

        if($check->isLoggedIn()){

            $account = new Account();

            $id = $check->getId();
            $userdata = $account->Getaddres($id);

            //Sla alle gegevens die zijn ingevuld op in de Data array
            $data = array();
            $data['vnaam'] = $userdata[0]->Firstname;
            $data['tvnaam'] = $userdata[0]->Preposistions;
            $data['anaam'] = $userdata[0]->Lastname;
            $data['email'] = $userdata[0]->email;
            $data['telefoonNr'] = $telefoonNr;
            $data['code'] = $userdata[0]->Postalcode;
            $data['street'] = $userdata[0]->Street;
            $data['huisnummer'] = $userdata[0]->HouseNr;
            $data['city'] = $userdata[0]->City;
            
            //Start de sessie en sla de Data array op in de sessie voor later gebruik
            session_start();
            $_SESSION['naw']=$data;

            $loggedin = true;

            var_dump($userdata);


            return $this->view->render("postcodecheck" , compact("userdata", "loggedin"));

        }

        return $this->view->render("postcodecheck");
    }

//Check de ingevulde gegevens
 function PostalCheck()
 {
     //Filter alle formulier input
     $vnaam = filter_input(INPUT_POST, "vnaam");
     $anaam = filter_input(INPUT_POST, "anaam");
     $tvnaam = filter_input(INPUT_POST, "tvnaam");
     $code = filter_input(INPUT_POST, "code");
     $num = filter_input(INPUT_POST, "num");
     $send = filter_input(INPUT_POST, "send");
     $email = filter_input(INPUT_POST, "email");
     $telefoonNr = filter_input(INPUT_POST, "telefoonNr");

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
         return $this->view->render("postcodecheck", compact("msg"));
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
                     "x-api-key: ".$apikeys[rand(0,7)]
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
                 if(isset($vnaam)){
                     $data['vnaam']=$vnaam;
                 }else {
                     $data['vnaam'] = "";
                 };
                 if(isset($tvnaam)){
                     $data['tvnaam']=$tvnaam;

                 }else{$data['tvnaam']="";};
                 if(isset($anaam)){
                     $data['anaam']=$anaam;
                 }else{$data['anaam']="";};
                 if(isset($email)){
                     $data['email']=$email;
                 }else{
                     $data['email']="";};
                 if(isset($telefoonNr)){
                     $data['telefoonNr']=$telefoonNr;
                 }else{
                     $data['telefoonNr']="";};
                 if(isset($code)){
                     $data['code']=$vnaam;
                 }else{$data['code']="";
                 };
                 if(isset($street)){
                     $data['street']=json_decode($response)->_embedded->addresses[0]->street;
                 }else{$data['street']="";
                 };
                 if(isset($huisnummer)){
                     $data['huisnummer']=$num;
                 }else{$data['huisnummer']="";
                 };
                 if(isset($province)){
                     $data['province']=json_decode($response)->_embedded->addresses[0]->province->label;
                 }else{$data['province']="";
                 };
                 if(isset($city)){
                     $data['city']=json_decode($response)->_embedded->addresses[0]->city->label;
                 }else{$data['city']="";
                 };

                 //Start de sessie en sla de Data array op in de sessie voor later gebruik
                 session_start();
                 $_SESSION['naw']=$data;

                 //roep de view aan
                 return $this->view->render("postcodecheck", compact("msg"));

             } else {


                 $msg = "Het adres lijkt te bestaan!";

                 //Sla alle gegevens die zijn ingevuld op in de Data array
                 $data = array();
                 $data['vnaam'] = $vnaam;
                 $data['tvnaam'] = $tvnaam;
                 $data['anaam'] = $anaam;
                 $data['email'] = $email;
                 $data['telefoonNr'] = $telefoonNr;
                 $data['code'] = $code;
                 $data['street'] = json_decode($response)->_embedded->addresses[0]->street;
                 $data['huisnummer'] = $num;
                 $data['province'] = json_decode($response)->_embedded->addresses[0]->province->label;
                 $data['city'] = json_decode($response)->_embedded->addresses[0]->city->label;

                 //Start de sessie en sla de Data array op in de sessie voor later gebruik
                 session_start();
                 $_SESSION['naw']=$data;

                 //roep de view aan
                 return $this->view->render("postcodecheck", compact("msg", 'data', 'response'));

             }
         } else {

             return "Error geen input geleverd";

         }

     }
 }


}


