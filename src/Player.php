<?php

use Model\GameState;

class Player {

    const VERSION = "PHP Player 0.1";

    /** @var GameState */
    private $gameState;

    public function betRequest($gameState) {
        $this->gameState = new GameState($gameState);
        $rank = $this->gameState->getRank();
        error_log($rank);
        error_log($this->gameState->currentBuyIn);
        if ($rank > 8) {
            return $this->gameState->currentBuyIn;
        }
        return 0;
    }

    public function showdown($gameState) {
        
    }

}
