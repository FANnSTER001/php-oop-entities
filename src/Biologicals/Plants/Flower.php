<?php

namespace Biologicals\Plants;

use Biologicals\Biological;

final class Flower extends Biological
{
    // Обязательная реализация метода из Biological
    #[\Override]
    protected function handleDeath(): void
    {
        echo "Цветок {$this->name} погиб.\n";
    }
}