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
        $chance = $this->getChance();
        $communityChance = $this->getCommunityChance();

        if ($communityChance >= $chance) {
            $chance = $chance * 0.8;
        }

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
        if ($chance > 0.19) {
            return $toCall;
        }
        return 0;
    }

    public function showdown($gameState) {
        
    }

    /**
     * @return float|int
     */
    public function getChance() {
        $cards = array_merge($this->gameState->communityCards, $this->gameState->me->holeCards);

        $ranking = new Ranking($cards, $this->gameState->me->holeCards);
        $chance = $ranking->getChance();
        return $chance;
    }

    /**
     * @return float|int
     */
    public function getCommunityChance() {
        $communityRanking = new Ranking($this->gameState->communityCards);
        $communityChance = $communityRanking->getChance();
        return $communityChance;
    }

}
