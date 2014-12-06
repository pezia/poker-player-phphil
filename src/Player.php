<?php

use Model\GameState;

class Player {

    const VERSION = "PHP Player 0.1";

    /** @var GameState */
    private $gameState;

    public function betRequest($gameState) {
        $this->gameState = new GameState($gameState);
        return $gameState->current_buy_in + 50;
    }

    public function showdown($gameState) {
        
    }

}
