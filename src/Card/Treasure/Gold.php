<?php

namespace Domin8or\Card\Treasure;

use Domin8or\Card;
use Domin8or\Card\Treasure;

class Gold extends Card implements Treasure
{
    public static function getCost(): int
    {
        return 6;
    }

    public static function getCardCount(): int
    {
        return 30;
    }

    public function getValue(): int
    {
        return 3;
    }
}