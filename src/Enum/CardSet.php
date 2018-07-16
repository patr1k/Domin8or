<?php

namespace Domin8or\Enum;

use Domin8or\Library\Enumerator;

/**
 * Card Set Enum
 *
 * @method static CardSet FirstGame()
 * @method static CardSet BigMoney()
 * @method static CardSet Interaction()
 * @method static CardSet SizeDistortion()
 * @method static CardSet VillageSquare()
 */
class CardSet extends Enumerator
{
    protected const FirstGame      = 'FirstGame';
    protected const BigMoney       = 'BigMoney';
    protected const Interaction    = 'Interaction';
    protected const SizeDistortion = 'SizeDistortion';
    protected const VillageSquare  = 'VillageSquare';
}