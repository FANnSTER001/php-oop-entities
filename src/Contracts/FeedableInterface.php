<?php

namespace Contracts;

//Контракт для объектов, которые можно кормить
interface FeedableInterface {
    //Метод кормления.
    public function feed(float $kg): void;
}