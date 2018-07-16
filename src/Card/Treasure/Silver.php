<?php

namespace Domin8or\Card\Treasure;

use Domin8or\Card;
use Domin8or\Card\Treasure;

class Silver extends Card implements Treasure
{
    public static function getCost(): int
    {
        return 3;
    }

    public static function getCardCount(): int
    {
        return 40;
    }

    public function getValue(): int
    {
        return 2;
    }
}