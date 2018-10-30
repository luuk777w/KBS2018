<?php

//voor als dit naar de public map gaat,
//moet natuurlijk ook even de composer zooi worden aangepast.

require "core/app.php";

$app = new \Core\App();

echo $app->start();