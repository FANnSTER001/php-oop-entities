<?php
require_once __DIR__ . '/../autoloader.php';

spl_autoload_register(function ($class) {
    $className = str_replace(search: '\\', replace: DIRECTORY_SEPARATOR, subject: $class);
    echo "\nClass: {$className}\n";
    $file = __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
    echo "\nFile: {$file}\n";
    if (file_exists($file)) {
        require_once $file;
    }
}, throw: true, prepend: false);

use Biologicals\Animals\Cow;
$Murka = new Cow(id: "1", name: "Мурка", initialWeight: 80.025);
print_r($Murka);

use Biologicals\Plants\Flower;
$rose = new Flower(id: "f-10", name: "Алая роза");
print_r($rose);

use Physicals\Tools\Hammer;
$hammer = new Hammer(id: "h-1", name: "Кузнечный молот", weight: 2.5);
print_r($hammer);