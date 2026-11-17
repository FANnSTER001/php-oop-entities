<?php
//Ручное подключение зависимостей. 
require_once __DIR__ . '/Biologicals/Biological.php';
require_once __DIR__ . '/Physicals/Physical.php';

//Создаем экземпляр анонимного класса-наследника Biological
//Так как Biological абстрактный, мы обязаны реализовать метод handleDeath(),
//иначе PHP выдаст фатальную ошибку при попытке создать объект
$plant = new class('plant-1', 'Пшеница') extends Biological {
    protected function handleDeath(): void
    {
        //Специфичная логика смерти для растения
        //Используем getName() из базового класса Entity, соблюдая инкапсуляцию
        echo "Растение {$this->getName()} погибло.\n";
    }
};
//Создаем экземпляр анонимного класса-наследника Physical
$tractor = new class('tractor-1', 'Трактор', 3500.0) extends Physical {};

// Проверяем геттеры (свойства $id и $name из Entity)
echo "Биологический объект: {$plant->getName()}, здоровье: {$plant->getHealth()}\n";

// Проверяем бизнес-логику изменения здоровья
// Метод changeHealth() должен корректно отработать мин/макс лимиты (от 0 до 100)
$plant->changeHealth(-25.0); // Наносим урон
echo "Здоровье после изменения: {$plant->getHealth()}\n";

// Проверяем физический объект
echo "Физический объект: {$tractor->getName()}, вес: {$tractor->getWeight()} кг\n";