<?php

//voor als dit naar de public map gaat,
//moet natuurlijk ook even de composer zooi worden aangepast.
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

require "core/app.php";

$app = new \Core\App();

echo $app->start();
