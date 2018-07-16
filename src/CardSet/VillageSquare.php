<?php

namespace Domin8or\CardSet;

use Domin8or\Card\Action\Bureaucrat;
use Domin8or\Card\Action\Cellar;
use Domin8or\Card\Action\Festival;
use Domin8or\Card\Action\Library;
use Domin8or\Card\Action\Market;
use Domin8or\Card\Action\Remodel;
use Domin8or\Card\Action\Smithy;
use Domin8or\Card\Action\ThroneRoom;
use Domin8or\Card\Action\Village;
use Domin8or\Card\Action\Woodcutter;
use Domin8or\CardSet;

abstract class VillageSquare extends CardSet
{
    public const Cards = [
        Bureaucrat::class,
        Cellar::class,
        Festival::class,
        Library::class,
        Market::class,
        Remodel::class,
        Smithy::class,
        ThroneRoom::class,
        Village::class,
        Woodcutter::class
    ];
}