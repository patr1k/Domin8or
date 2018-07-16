<?php

namespace Domin8or\Card\Victory;

use Domin8or\Card;
use Domin8or\Card\Victory;

class Estate extends Card implements Victory
{
    public static function getCost(): int
    {
        return 3;
    }

    public static function getCardCount(): int
    {
        return 25;
    }

    public function getPoints(): int
    {
        return 1;
    }
}