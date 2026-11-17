<?php
//Ручное подключение зависимостей. 
require_once __DIR__ . '/Biologicals/Biological.php';
require_once __DIR__ . '/Physicals/Physical.php';

//Создаем экземпляр анонимного класса-наследника Biological
$plant = new class('plant-1', 'Пшеница') extends Biological {
    protected function handleDeath(): void
    {
        // Специфичная логика смерти для растения
        echo "Растение {$this->name} погибло.\n";
    }
};

//Создаем экземпляр анонимного класса-наследника Physical
$tractor = new class('tractor-1', 'Трактор', 3500.0) extends Physical {
    public function attachTo(Physical $physical): Physical {
        return $this; // Заглушка
    }
};

// Проверяем геттеры
echo "Биологический объект: {$plant->name}, здоровье: {$plant->health}\n";
echo "\n--- Наносим урон растению (-60.0) ---\n";
$plant->changeHealth(-60.0); 

//Проверяем, что здоровье изменилось
echo "Здоровье после изменения: {$plant->health}\n";
//Проверяем виртуальное свойство (если бы оно было в Biological)
//echo "Растение здорово? " . ($plant->health > 50 ? 'Да' : 'Нет') . "\n";

//Проверяем физический объект
echo "\nФизический объект: {$tractor->name}, вес: {$tractor->weight} кг\n";