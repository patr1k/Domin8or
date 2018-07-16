<?php

namespace Domin8or\Card\Action;

use Domin8or\Card;
use Domin8or\Card\Reaction;

class Moat extends Card implements Reaction
{
    public static function getCost(): int
    {
        return 2;
    }

    public function doAction(): void
    {
        // TODO: Implement doAction() method.
    }
}