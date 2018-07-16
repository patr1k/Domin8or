<?php

namespace Domin8or\CardSet;

use Domin8or\Card\Action\Adventurer;
use Domin8or\Card\Action\Bureaucrat;
use Domin8or\Card\Action\Chancellor;
use Domin8or\Card\Action\Chapel;
use Domin8or\Card\Action\Feast;
use Domin8or\Card\Action\Laboratory;
use Domin8or\Card\Action\Market;
use Domin8or\Card\Action\Mine;
use Domin8or\Card\Action\Moneylender;
use Domin8or\Card\Action\ThroneRoom;
use Domin8or\CardSet;

abstract class BigMoney extends CardSet
{
    public const Cards = [
        Adventurer::class,
        Bureaucrat::class,
        Chancellor::class,
        Chapel::class,
        Feast::class,
        Laboratory::class,
        Market::class,
        Mine::class,
        Moneylender::class,
        ThroneRoom::class
    ];
}