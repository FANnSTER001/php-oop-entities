<?php

//use core\Autoloader;
require_once("Autoloader.php");


$autoloader = new Autoloader();
$autoloader->addNamespace('\core', __DIR__);

$testBool =  $autoloader->loadClass("\core\Autoloader");
echo "\n{$testBool}"; 