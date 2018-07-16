<?php

namespace Domin8or\Card\Treasure;

use Domin8or\Card;
use Domin8or\Card\Treasure;

class Copper extends Card implements Treasure
{
    public static function getCost(): int
    {
        return 0;
    }

    public static function getCardCount(): int
    {
        return 60;
    }

    public function getValue(): int
    {
        return 1;
    }
}