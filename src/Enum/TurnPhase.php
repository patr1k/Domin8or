<?php

namespace Domin8or\Enum;

use Domin8or\Library\Enumerator;

/**
 * Turn Phase Enum
 *
 * @method static GameState Actions()
 * @method static GameState Buying()
 * @method static GameState Cleanup()
 */
class TurnPhase extends Enumerator
{
    protected const Actions = 'A';
    protected const Buying  = 'B';
    protected const Cleanup = 'C';
}