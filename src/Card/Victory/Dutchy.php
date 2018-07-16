<?php

namespace Domin8or\Card\Victory;

use Domin8or\Card;
use Domin8or\Card\Victory;

class Dutchy extends Card implements Victory
{
    public static function getCost(): int
    {
        return 5;
    }

    public static function getCardCount(): int
    {
        return 12;
    }

    public function getPoints(): int
    {
        return 3;
    }
}