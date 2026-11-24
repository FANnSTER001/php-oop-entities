<?php

namespace Physicals\Equipments;

use Physicals\Physical;

final class Tractor extends Equipment
{
     /**
     * Применяем правило ковариантности возвращаемого значения: 
     * в родительском классе Physical метод возвращает Physical, 
     * а здесь мы сужаем тип до Tractor. 
     */
    #[\Override]
    public function attachTo(Physical $physical): Tractor
    {
        // Защита от переполнения износа
        $this->wear = min(100.0, $this->wear + 1.0); 
        
        return $this;
    }

    /**
     * Переопределение сигнатуры по правилу ковариантности.
     */
    #[\Override]
    public function service(): Tractor
    {
        parent::service();
        $this->refuel(50.0);
        return $this;
    }
}