<?php

namespace Domin8or;

class DeckPile extends CardPile
{
    /**
     * @var DiscardPile
     */
    private $discard;

    /**
     * DeckPile constructor.
     * @param DiscardPile $discard
     */
    public function __construct(DiscardPile $discard)
    {
        $this->discard = $discard;
    }

    /**
     * @return Card
     */
    public function drawCard(): Card
    {
        if (0 === $this->getCardCount()) {
            $this->discard->shuffle();
            $this->cards = $this->discard->getCards();
            $this->shuffle();
        }

        return array_pop($this->cards);
    }
}