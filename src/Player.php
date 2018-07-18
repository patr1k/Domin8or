<?php

namespace Domin8or;

use Domin8or\Card\Action;
use Domin8or\Card\Treasure\Copper;
use Domin8or\Card\Victory\Estate;
use Domin8or\Card\Victory;
use Domin8or\Exceptions\InvalidCardException;

abstract class Player
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $actions = 1;

    /**
     * @var int
     */
    protected $buys = 1;

    /**
     * @var DeckPile
     */
    protected $deck = [];

    /**
     * @var Hand
     */
    protected $hand;

    /**
     * @var DiscardPile
     */
    protected $discard = [];

    /**
     * Player constructor.
     * @param string $name
     * @throws Exceptions\OutOfCardsException
     * @throws InvalidCardException
     */
    public function __construct(string $name)
    {
        $this->name = $name;

        $this->discard = new DiscardPile();
        $this->deck    = new DeckPile($this->discard);
        $this->hand    = new Hand($this->deck, $this->discard);

        for ($i = 0; $i < 7; $i++) {
            $this->deck->addCard(Game::getCard('Copper'));
        }

        for ($i = 0; $i < 3; $i++) {
            $this->deck->addCard(Game::getCard('Estate'));
        }

        $this->deck->shuffle();
    }

    /**
     * Start player's turn
     */
    public function startTurn(): void
    {
        if (0 === $this->hand->getCardCount()) {
            $this->hand->drawCards();
        }

        $this->showTurnInfo();
    }

    public function showTurnInfo(): void
    {
        echo "Player:  {$this->name}\n";
        echo "Actions: {$this->actions}\n";
        echo "Buys:    {$this->buys}\n";

        echo "Your cards are:\n";

        foreach ($this->hand->getCardsInfo() as $card_name => $card_count) {
            echo "  - {$card_count}x {$card_name}\n";
        }
    }

    public function getActionsList(): array
    {
        return [];
    }

    /**
     * End player's turn
     */
    public function endTurn(): void
    {
        $this->actions = 1;
        $this->buys    = 1;

        $this->hand->discardAll();
        $this->hand->drawCards();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        $score = 0;

        foreach ($this->deck as $card) {
            if ($card instanceof Victory) {
                $score += $card->getPoints();
            }
        }

        return $score;
    }

    /**
     * @param int $draws
     * @return Player
     */
    public function addDraws(int $draws): self
    {
        $this->drawCards($draws);
        return $this;
    }

    /**
     * @param int $actions
     * @return Player
     */
    public function addActions(int $actions): self
    {
        $this->actions += $actions;
        return $this;
    }

    /**
     * @param Card $card
     * @throws InvalidCardException
     */
    public function playCard(Card $card): void
    {
        if (!$card instanceof Action) {
            throw new InvalidCardException("You can't play {$card->getName()}. It's not an action card.");
        }

        $card->doAction();
    }

    /**
     * @return int
     */
    public function getCardCount(): int
    {
        return $this->deck->getCardCount() + $this->hand->getCardCount() + $this->discard->getCardCount();
    }
}