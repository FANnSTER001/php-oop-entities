<?php

$dir = __DIR__;
$equipment = $dir . '/Equipment.php';
$Biological = $dir . '/Biologicals/Biological.php';

if (file_exists($equipments)) {
    require_once $entity;
    echo "Файл '" . $entity . "' подключен";
}

final class Tractor extends Equipment
{
     /**
     * Применяем правило ковариантности возвращаемого значения: 
     * в родительском классе Physical метод возвращает Physical, 
     * а здесь мы сужаем тип до Tractor. Это позволяет продолжить работу 
     * с конкретным типом (Трактором) после вызова метода
     * 
     * (Правило контравариантности позволяет расширять тип параметра)
     */
    #[\Override]
    public function attachTo(Physical $physical): Tractor
    {
        //Любое прикрепление изнашивает деталь на 1%
        $this->wear += 1.0; 
        
        return $this;
    }

    #[\Override]
    public function service(): Tractor
    //переопределение сигнатуры по правилу ковариантности
    {
        parent::service();
        $this->refuel(50.0);
        return $this;
    }
}