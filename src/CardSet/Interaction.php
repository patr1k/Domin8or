<?php

namespace Domin8or\CardSet;

use Domin8or\Card\Action\Bureaucrat;
use Domin8or\Card\Action\Chancellor;
use Domin8or\Card\Action\CouncilRoom;
use Domin8or\Card\Action\Festival;
use Domin8or\Card\Action\Library;
use Domin8or\Card\Action\Militia;
use Domin8or\Card\Action\Moat;
use Domin8or\Card\Action\Spy;
use Domin8or\Card\Action\Thief;
use Domin8or\Card\Action\Village;
use Domin8or\CardSet;

abstract class Interaction extends CardSet
{
    public const Cards = [
        Bureaucrat::class,
        Chancellor::class,
        CouncilRoom::class,
        Festival::class,
        Library::class,
        Militia::class,
        Moat::class,
        Spy::class,
        Thief::class,
        Village::class
    ];
}