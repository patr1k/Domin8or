<?php

namespace Domin8or\CardSet;

use Domin8or\Card\Action\Cellar;
use Domin8or\Card\Action\Chapel;
use Domin8or\Card\Action\Feast;
use Domin8or\Card\Action\Laboratory;
use Domin8or\Card\Action\Thief;
use Domin8or\Card\Action\Village;
use Domin8or\Card\Action\Witch;
use Domin8or\Card\Action\Woodcutter;
use Domin8or\Card\Action\Workshop;
use Domin8or\Card\Victory\Gardens;
use Domin8or\CardSet;

abstract class SizeDistortion extends CardSet
{
    public const Cards = [
        Cellar::class,
        Chapel::class,
        Feast::class,
        Gardens::class,
        Laboratory::class,
        Thief::class,
        Village::class,
        Witch::class,
        Woodcutter::class,
        Workshop::class
    ];
}