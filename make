<?php

$keuze = $argv[1];
$naam = $argv[2];

if($keuze == "controller"){

    $file = fopen("app/controllers/${naam}.php", "w");
    fwrite($file,
"<?php

namespace App\Controllers;

use Core\Controller;

class ${naam} extends Controller
{


}");

    fclose($file);

    echo "Controller gemaakt.";

} else if($keuze == "model"){

    $file = fopen("app/models/${naam}.php", "w");
        fwrite($file,
    "<?php

    namespace App\Models;

    use Core\Model;

    class ${naam} extends Model
    {


    }");

        fclose($file);

        echo "Model gemaakt.";

} else {
    echo "Error!";
}