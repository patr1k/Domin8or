<?php

namespace Domin8or\Enum;

use Domin8or\Library\Enumerator;

/**
 * Game State Enum
 *
 * @method static GameState Setup()
 * @method static GameState InProgress()
 * @method static GameState GameOver()
 */
class GameState extends Enumerator
{
    protected const Setup      = 'S';
    protected const InProgress = 'P';
    protected const GameOver   = 'O';
}