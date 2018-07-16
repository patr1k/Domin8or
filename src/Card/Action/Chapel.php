<?php

namespace Domin8or\Card\Action;

use Domin8or\Card;
use Domin8or\Card\Action;

class Chapel extends Card implements Action
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