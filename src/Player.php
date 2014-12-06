<?php

use Model\GameState;
use Model\Ranking;

class Player {

    const VERSION = "PHP Player 0.2";

    /** @var GameState */
    private $gameState;

    /**
     * @param $gameState
     * @return int
     */
    public function betRequest($gameState) {
        $this->gameState = new GameState($gameState);
        $ranking = new Ranking($this->gameState);
        $chance = $ranking->getChance();

        if ($chance > 0.89) {
            return 4000;
        }

        $toCall = $this->gameState->currentBuyIn - $this->gameState->me->bet;
        if ($chance > 0.59) {
            return $toCall + $this->gameState->minimumRaise * 4;
        }
        if ($chance > 0.39) {
            return $toCall + $this->gameState->minimumRaise;
        }
        if ($chance > 0.29) {
            return $toCall;
        }
        return 0;
    }

    public function showdown($gameState) {
        
    }

}
