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

use Domin8or\Enum\GameState;
use Domin8or\Enum\CardSet as CardSetEnum;
use Domin8or\Exceptions\TooManyPlayersException;

abstract class Game
{
    /**
     * @var GameState
     */
    protected static $state;

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
     * @var array
     */
    protected static $cards = [];

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
        self::$cards   = $cardSetClass::getCards();
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
     * End the game
     */
    public static function endGame(): void
    {
        self::$state = GameState::GameOver();

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
}