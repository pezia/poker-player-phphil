<?php

use Model\GameState;

class Player {

    const VERSION = "PHP Player 0.1";

    /** @var GameState */
    private $gameState;

    public function betRequest($gameState) {
        $this->gameState = new GameState($gameState);
        return $this->gameState->currentBuyIn + 50;
    }

    public function showdown($gameState) {
        
    }

}
