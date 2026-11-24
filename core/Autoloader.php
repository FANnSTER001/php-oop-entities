<?php

//namespace core;

final class Autoloader
{
    private array $prefixes = [];

    public function register(): void
    {
        spl_autoload_register([$this, 'autoload']);
    }

    // Регистрирует префикс пространства имен и соответствующий ему базовый каталог
    public function addNamespace(string $prefix, string $baseDir): void
{
    // Приводим путь к единому виду
    // Защищает от ошибок, если путь передан как "src" или "src/"
    $baseDir = rtrim($baseDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

    // Сохраняем: префикс неймспейса => папка на диске
    $this->prefixes[$prefix] = $baseDir;
    
    //print_r($this->prefixes);
    }
    public function loadClass(string $class): bool
    {
        foreach ($this->prefixes as $prefix=> $baseDir){
            // Необходимо отрезать префикс от полного имени класса
            if (str_starts_with($class, $prefix)){
                $className = substr($class, strlen($prefix));
                $file = $baseDir.str_replace('\\', DIRECTORY_SEPARATOR,$className).'.php';
                echo $file;

                if($this->requireFile($file)){
                    return true;
                }
            }
        }
        return false;
    }

    private function requireFile(string $file): bool   
    {
        if(is_file($file)){
            require_once $file;
            return true;
        }
        return false;
    }
}