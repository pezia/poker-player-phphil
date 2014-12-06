<?php

use Model\GameState;

class Player {

    const VERSION = "PHP Player 0.2";

    /** @var GameState */
    private $gameState;

    public function betRequest($gameState) {
        $this->gameState = new GameState($gameState);
        $rank = $this->gameState->getRank();
        $pair = $this->gameState->hasPair();
        error_log($rank);
        error_log($this->gameState->currentBuyIn);
        if ($pair) {
            return $this->gameState->currentBuyIn + 50;
        }
        if ($rank > 8) {
            return $this->gameState->currentBuyIn;
        }
        return 0;
    }

    public function showdown($gameState) {
        
    }

}
