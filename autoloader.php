<?php
// spl_autoload_register(
//     ?callable $callback = null,
//     bool $throw = true,
//     bool $prepend = false
// ): bool


// Для проектов без неймспейсов (классы лежат в папке classes)
// spl_autoload_register(function ($className) {
//     $file = __DIR__ . "/classes/" . $className . ".php"; // 1. Построение пути к файлу
//
//     if(file_exists($file)) { // 2. Осуществление проверки на существование файла
//         require_once($file); // 3. Подключение файла
//     }
// }, true, true);



spl_autoload_register(function ($class) {
// Меняем слэши неймспейса на разделители папок (Windows/Linux/MacOs)
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $class); 
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $className . '.php'; // Формируем полный путь к файлу (т.к. всё закинули в src, пришлось подправить)
    
     if (file_exists($file)) { // Если файл существует, подключаем его
         require_once $file;
     }
 }, true, true);