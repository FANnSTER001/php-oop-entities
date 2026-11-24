<?php

namespace Physicals\Equipments;

use Physicals\Physical;
use Contracts\PoweredInterface;

abstract class Equipment extends Physical implements PoweredInterface
{
    /**
     * Уровень топлива (от 0.0 до 100.0)
     */
    public protected(set) float $fuelLevel = 0.0 {
        set(float $value) {
            $this->fuelLevel = $value;
        }
    }

    public function getPercentage(): float {
        return $this->fuelLevel;
    }

    public function refuel(float $units): void
    {
        if($units <= 0.0){
            throw new \InvalidArgumentException(message: "Значение может быть только положительным");
        }
        $this->fuelLevel = min(100.0, $this->fuelLevel + $units);
    }

    #[\Override]
    public function service(): Equipment
    {
        parent::service();
        return $this;
    }
}