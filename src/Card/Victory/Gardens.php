<?php

namespace Domin8or\Card\Victory;

use Domin8or\Card;
use Domin8or\Card\Victory;
use Domin8or\Domin8or;
use Domin8or\Library\Factory;

class Gardens extends Card implements Victory
{
    public static function getCost(): int
    {
        return 8;
    }

    public static function getCardCount(): int
    {
        return 12;
    }

    public function getPoints(): int
    {
        /** @var Domin8or $game */
        $game = Factory::get('game');

        return floor($game->getCurrentPlayer()->getCardCount() / 10);
    }
}