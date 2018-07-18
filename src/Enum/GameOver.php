<?php

namespace Domin8or\Enum;

use Domin8or\Library\Enumerator;

/**
 * Game Over Enum
 *
 * @method static GameOver NoMoreProvinces()
 * @method static GameOver ThreePilesEmpty()
 * @method static GameOver GameOver()
 */
class GameOver extends Enumerator
{
    protected const NoMoreProvinces      = 'S';
    protected const ThreePilesEmpty = 'P';
    protected const GameOver   = 'O';
}