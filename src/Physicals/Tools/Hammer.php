<?php

namespace Physicals\Tools;

use Physicals\Physical;

final class Hammer extends Physical
{
    // Реализуем обязательный абстрактный метод из Physical
    #[\Override]
    public function attachTo(Physical $physical): Hammer
    {
        // Просто возвращаем себя (заглушка)
        return $this;
    }
}