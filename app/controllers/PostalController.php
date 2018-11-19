<?php


namespace App\Controllers;

use Core\Auth;
use Core\Controller;

class PostalController extends Controller
{

    public function index(){
        return $this->view->render("postcodecheck");
    }


 function PostalCheck()
 {
     $vnaam = filter_input(INPUT_POST, "vnaam");
     $anaam = filter_input(INPUT_POST, "anaam");
     $tvnaam = filter_input(INPUT_POST, "tvnaam");
     $code = filter_input(INPUT_POST, "code");
     $num = filter_input(INPUT_POST, "num");
     $send = filter_input(INPUT_POST, "send");
     $email = filter_input(INPUT_POST, "email");

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
     

     if ($num == 0) {
         //Geef het volgede bericht door aan de view
         $msg = "Het huisnummer kan geen 0 zijn, check uw gegevens en probeer het nog eens";

         //roep de view aan
         return $this->view->render("postcodecheck", compact("msg"));
     } else {
         if ($send != NULL) {

             $curl = curl_init();

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

             $response = curl_exec($curl);
             $err = curl_error($curl);

             curl_close($curl);

             if ($err) {
                 $msg = "cURL Error #:" . $err;

                 //check of er adres gegevens zijn, als deze er niet zijn doe dit dan
             } elseif (json_decode($response)->_embedded->addresses[0] == '') {

                 //Geef het volgede bericht door aan de view
                 $msg = "Het adres lijkt niet te bestaan, check uw gegevens en probeer het nog eens";

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

                 session_start();

                 $_SESSION['naw']=$data;

                 //roep de view aan
                 return $this->view->render("postcodecheck", compact("msg"));

             } else {
                 $msg = "Het adres lijkt te bestaan!";

                 $data = array();
                 $data['vnaam'] = $vnaam;
                 $data['tvnaam'] = $tvnaam;
                 $data['anaam'] = $anaam;
                 $data['email'] = $email;
                 $data['code'] = $code;
                 $data['street'] = json_decode($response)->_embedded->addresses[0]->street;
                 $data['huisnummer'] = $num;
                 $data['province'] = json_decode($response)->_embedded->addresses[0]->province->label;
                 $data['city'] = json_decode($response)->_embedded->addresses[0]->city->label;

                 session_start();

                 $_SESSION['naw']=$data;

                 return $this->view->render("postcodecheck", compact("msg", 'data', 'response'));

             }
         } else {

             return "Error geen input geleverd";

         }

     }
 }


}


