<?php

namespace Domin8or\Card\Action;

use Domin8or\Card;
use Domin8or\Card\Action;

class Smithy extends Card implements Action
{
    public static function getCost(): int
    {
        return 4;
    }

    public function doAction(): void
    {
        // TODO: Implement doAction() method.
    }
}