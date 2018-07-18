#!/usr/bin/env php
<?php
/**
 * Domin8or CLI Script
 */

use Domin8or\Game;
use Domin8or\Library\Factory;
use Domin8or\Enum\CardSet as CardSets;
use Domin8or\CardSet;

require_once __DIR__.'/vendor/autoload.php';

Factory::register('redis', function() {
    return new Redis();
});

Game::setCardSet(CardSets::FirstGame());
Game::addPlayer(new Domin8or\Player\Human('Patrik'));
Game::addPlayer(new Domin8or\Player\Human('Grady'));
Game::startGame();