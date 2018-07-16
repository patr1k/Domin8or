<?php

namespace Domin8or;

use Domin8or\Card\Action;
use Domin8or\Card\Treasure;
use Domin8or\Exceptions\InvalidCardException;

class CardPile
{
    /**
     * @var Card[]
     */
    protected $cards = [];

    /**
     * @param Card $card
     */
    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    /**
     * @param Card $card
     * @throws InvalidCardException
     */
    public function removeCard(Card $card): void
    {
        foreach ($this->cards as $i => $hand_card) {
            if ($card === $hand_card) {
                array_splice($this->cards, $i, 1);
                break;
            }
        }

        throw new InvalidCardException("Cannot remove {$card->getName()} from hand. It doesn't exist!");
    }

    /**
     * @return array
     */
    public function getCardsInfo(): array
    {
        $cards = [];
        foreach ($this->cards as $card) {
            if (array_key_exists($card->getName(), $cards)) {
                $cards[$card->getName()]++;
            } else {
                $cards[$card->getName()] = 1;
            }
        }
        return $cards;
    }

    /**
     * @return int
     */
    public function getTreasureValue(): int
    {
        $value = 0;
        foreach ($this->cards as $card) {
            if ($card instanceof Treasure) {
                $value += $card->getValue();
            }
        }
        return $value;
    }

    /**
     * @return bool
     */
    public function hasActionCards(): bool
    {
        foreach ($this->cards as $card) {
            if ($card instanceof Action) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return int
     */
    public function getCardCount(): int
    {
        return \count($this->cards);
    }

    /**
     * @return Card[]
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    /**
     * Shuffle cards
     */
    public function shuffle(): void
    {
        shuffle($this->cards);
    }
}