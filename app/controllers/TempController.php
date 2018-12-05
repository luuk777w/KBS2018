<?php

namespace App\Controllers;

use App\Models\Temp;
use Core\Controller;

class TempController extends Controller
{

    public function updateTemp()
    {
         $data = json_decode($_POST);

         $temp = $data->temp;
        $time = $data->time;

//        $tempin = $_POST['temp'];
//         print_r($tempin);
//         $temp = intval($tempin);
//         $time = $_POST['time'];

                $dbtemp = new Temp();

            $dbtemp->update($time, $temp);

        var_dump($temp, $time);

    }

}
