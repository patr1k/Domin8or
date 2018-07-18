<?php

namespace Domin8or;

use Domin8or\Card\Treasure\Copper;
use Domin8or\Card\Treasure\Gold;
use Domin8or\Card\Treasure\Silver;
use Domin8or\Card\Victory\Dutchy;
use Domin8or\Card\Victory\Estate;
use Domin8or\Card\Victory\Province;
use Domin8or\Enum\GameOver;
use Domin8or\Exceptions\InvalidCardException;
use Domin8or\Exceptions\OutOfCardsException;

class CardTable
{
    /**
     * @var Card[][]
     */
    private $cards = [];

    /**
     * @var Card[]
     */
    private $trash = [];

    /**
     * CardTable constructor.
     * @param Card[][] $cards
     */
    public function __construct(array $cards)
    {
        /** @var Card[] $starting_cards */
        $starting_cards = [
            Copper::class,
            Silver::class,
            Gold::class,
            Estate::class,
            Dutchy::class,
            Province::class
        ];

        // Create the starting cards
        foreach ($starting_cards as $card_class) {
            $card_name  = $card_class::getName();
            $card_count = $card_class::getCardCount();
            $this->cards[$card_name] = [];
            for ($i = 0; $i < $card_count; $i++) {
                $this->cards[$card_name][] = new $card_class();
            }
        }

        // Add the card set
        foreach ($cards as $card_name => $card_pile) {
            $this->cards[$card_name] = [];
            foreach ($card_pile as $card) {
                $this->cards[$card_name][] = $card;
            }
        }
    }

    /**
     * @param string $name
     * @return Card
     * @throws InvalidCardException
     * @throws OutOfCardsException
     */
    public function getCard(string $name): Card
    {
        if (!array_key_exists($name, $this->cards)) {
            throw new InvalidCardException("The card {$name} is not in use for this game.");
        }

        if (0 === ($count = \count($this->cards[$name]))) {
            throw new OutOfCardsException("There are no more {$name} cards left.");
        }

        $card = array_pop($this->cards[$name]);

        if (1 === $count) {
            switch ($name) {
                case 'Province':
                    Game::endGame(GameOver::NoMoreProvinces());
                    break;

            }
        }

        return $card;
    }

    /**
     * @param Card $card
     */
    public function trashCard(Card $card): void
    {
        $this->trash[] = $card;
    }
}