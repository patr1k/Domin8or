<?php

namespace Domin8or\CardSet;

use Domin8or\Card\Action\Cellar;
use Domin8or\Card\Action\Market;
use Domin8or\Card\Action\Militia;
use Domin8or\Card\Action\Mine;
use Domin8or\Card\Action\Moat;
use Domin8or\Card\Action\Remodel;
use Domin8or\Card\Action\Smithy;
use Domin8or\Card\Action\Village;
use Domin8or\Card\Action\Woodcutter;
use Domin8or\Card\Action\Workshop;
use Domin8or\CardSet;

abstract class FirstGame extends CardSet
{
    public const Cards = [
        Cellar::class,
        Market::class,
        Militia::class,
        Mine::class,
        Moat::class,
        Remodel::class,
        Smithy::class,
        Village::class,
        Woodcutter::class,
        Workshop::class
    ];
}