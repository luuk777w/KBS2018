<?php

namespace App\Controllers;

use App\Models\Temp;
use Core\Controller;

class TempController extends Controller
{

    public function updateTemp()
    {
        $in = file_get_contents("php://input");
        $data = json_decode($in);
        $tempin = $data->temp;
        $time = $data->time;

        $temp = number_format($tempin);
//        $tempin = $_POST['temp'];
//         print_r($tempin);
//         $time = $_POST['time'];

                $dbtemp = new Temp();

            var_dump($dbtemp->update($time, $temp));

        var_dump($data,$temp,$time);

    }

}
