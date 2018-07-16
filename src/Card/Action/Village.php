<?php

namespace Domin8or\Card\Action;

use Domin8or\Card;
use Domin8or\Card\Action;
use Domin8or\Game;

class Village extends Card implements Action
{
    public static function getCost(): int
    {
        return 3;
    }

    public function doAction(): void
    {
        Game::getCurrentPlayer()
            ->addDraws(1)
            ->addActions(2);
    }
}