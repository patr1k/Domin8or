<?php
/**
 * Domin8or
 *
 * Dominion Card Game Simulator
 *
 * @author  Patrick DeLoughry <pat.deloughry@gmail.com>
 * @link    https://github.com/patr1k/domin8or.git
 * @license MIT license
 */

namespace Domin8or;

use Domin8or\Enum\GameOver;
use Domin8or\Enum\GameState;
use Domin8or\Enum\CardSet as CardSetEnum;
use Domin8or\Exceptions\InvalidCardException;
use Domin8or\Exceptions\OutOfCardsException;
use Domin8or\Exceptions\TooManyPlayersException;

abstract class Game
{
    /**
     * @var GameState
     */
    protected static $state;

    /**
     * @var GameOver
     */
    protected static $gameOver;

    /**
     * @var Player[]
     */
    protected static $players = [];

    /**
     * @var int
     */
    protected static $currentPlayer = 0;

    /**
     * @var string
     */
    protected static $cardSet;

    /**
     * @var CardTable
     */
    protected static $cardTable;

    /**
     * @param Player $player
     * @throws TooManyPlayersException
     */
    public static function addPlayer(Player $player): void
    {
        if (4 === \count(self::$players)) {
            throw new TooManyPlayersException('Game cannot have more than 4 players');
        }

        self::$players[] = $player;
    }

    /**
     * @param CardSetEnum $cardSet
     * @throws Exceptions\InvalidCardSetException
     */
    public static function setCardSet(CardSetEnum $cardSet): void
    {
        /** @var CardSet $cardSetClass */
        $cardSetClass  = __NAMESPACE__.'\CardSet\\'.$cardSet->getValue();
        self::$cardSet = $cardSetClass::getName();
        self::$cardTable = new CardTable($cardSetClass::getCards());
    }

    /**
     * Start the game
     */
    public static function startGame(): void
    {
        self::$state = GameState::InProgress();
        $players = \count(self::$players);
        echo "Starting game with {$players} players\n";
        self::getCurrentPlayer()->startTurn();
    }

    /**
     * @param GameOver $reason
     */
    public static function endGame(GameOver $reason): void
    {
        self::$state    = GameState::GameOver();
        self::$gameOver = $reason;

        echo "The game has ended\n";
    }

    /**
     * Get the player who's turn it is
     *
     * @return Player
     */
    public static function getCurrentPlayer(): Player
    {
        return self::$players[self::$currentPlayer];
    }

    /**
     * Tally everyone's scores
     *
     * @return array
     */
    public static function tallyScores(): array
    {
        $scores = [];

        foreach (self::$players as $player) {
            $scores[] = [
                'name'  => $player->getName(),
                'score' => $player->getScore()
            ];
        }

        usort($scores, function($a, $b): int {
            return $a['score'] <=> $b['score'];
        });

        return $scores;
    }

    /**
     * @param string $name
     * @return Card
     * @throws InvalidCardException
     * @throws OutOfCardsException
     */
    public static function getCard(string $name): Card
    {
        return self::$cardTable->getCard($name);
    }

    /**
     * @param Card $card
     */
    public static function trashCard(Card $card): void
    {
        self::$cardTable->trashCard($card);
    }
}