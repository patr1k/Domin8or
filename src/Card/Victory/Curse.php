<?php

namespace Domin8or\Card\Victory;

use Domin8or\Card;
use Domin8or\Card\Victory;

class Curse extends Card implements Victory
{
    public static function getCost(): int
    {
        return 0;
    }

    public static function getCardCount(): int
    {
        return 30;
    }

    public function getPoints(): int
    {
        return -1;
    }
}