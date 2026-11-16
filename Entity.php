<?php
abstract class Entity {
    //Базовые свойства любой сущности в нашей системе
    protected string $id;
    protected string $name;

    public function __construct(string $id, string $name) {
        //Используем сеттеры в конструкторе, чтобы валидация (проверка на пустоту) 
        //срабатывала сразу при создании объекта, а не где-то потом
        $this->setID($id);
        $this->setName($name);
    }

    protected function setID(string $id): void {
        $trimmed = trim($id);
        //Защита от "пустых" ID (например, если передали одни пробелы)
        if ($trimmed === '') {
            throw new \InvalidArgumentException("ID не может быть пустым"); 
        }
        //Сохраняем именно обрезанную версию, чтобы в базе не было лишних пробелов
        $this->id = $trimmed; 
    }

    public function getID(): string {
        return $this->id; 
    }

    protected function setName(string $name): void {
        $trimmed = trim($name);
        if ($trimmed === '') {
            throw new \InvalidArgumentException("Именование не может быть пустым"); 
        }
        $this->name = $trimmed; 
    }

    public function getName(): string {
        return $this->name; 
    }
}

// XD