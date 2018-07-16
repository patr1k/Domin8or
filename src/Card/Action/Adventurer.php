<?php

namespace Domin8or\Card\Action;

use Domin8or\Card;
use Domin8or\Card\Action;

class Adventurer extends Card implements Action
{
    public static function getCost(): int
    {
        return 6;
    }

    public function doAction(): void
    {
        // TODO: Implement doAction() method.
    }
}