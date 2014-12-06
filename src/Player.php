<?php

use Model\GameState;

class Player {

    const VERSION = "PHP Player 0.1";

    /** @var GameState */
    private $gameState;

    public function betRequest($gameState) {
        $this->gameState = new GameState($gameState);
        if ($this->gameState->getRank() > 8) {
            return $this->gameState->currentBuyIn;
        }
        return 0;
    }

    public function showdown($gameState) {
        
    }

}
