<?php

namespace Domin8or;

class Hand extends CardPile
{
    /**
     * @var DeckPile
     */
    private $deck;

    /**
     * @var DiscardPile
     */
    private $discard;

    /**
     * Hand constructor.
     * @param CardPile $deck
     * @param CardPile $discard
     */
    public function __construct(CardPile $deck, CardPile $discard)
    {
        $this->deck    = $deck;
        $this->discard = $discard;
    }

    /**
     * Discard all cards in hand
     */
    public function discardAll(): void
    {
        while ($card = array_pop($this->cards)) {
            $this->discard->addCard($card);
        }
    }

    /**
     * @param int $num
     */
    public function drawCards(int $num = 5): void
    {
        for ($i = 0; $i < $num; $i++) {
            $this->addCard($this->deck->drawCard());
        }
    }
}