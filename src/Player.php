<?php

use Model\GameState;

class Player {

    const VERSION = "PHP Player 0.2";

    /** @var GameState */
    private $gameState;

    public function betRequest($gameState) {
        $this->gameState = new GameState($gameState);
        $ranking = new \Model\Ranking($this->gameState);
        $rank = $this->gameState->getRank();
        $pair = $this->gameState->hasPair();
        error_log('rank: '.$rank);
        error_log('pairs: '.$ranking->pairs);
        error_log('drill: '.$ranking->drill);
        error_log('poker: '.$ranking->poker);
        error_log('currentBuyIn: '.$this->gameState->currentBuyIn);
        if ($ranking->poker > 0) {
            return 4000;
        }
        if ($ranking->drill > 0 && $ranking->pairs > 0) {
            return 4000;
        }
        if ($ranking->drill > 0) {
            return $this->gameState->currentBuyIn + 1000;
        }
        if ($ranking->pairs > 1) {
            return $this->gameState->currentBuyIn + 100;
        }
        if ($ranking->pairs > 0) {
            return $this->gameState->currentBuyIn;
        }
        if ($rank > 7 && $this->gameState->currentBuyIn < 200) {
            return $this->gameState->currentBuyIn;
        }
        return 0;
    }

    public function showdown($gameState) {
        
    }

}
