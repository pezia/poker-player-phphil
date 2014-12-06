<?php

use Model\GameState;
use Model\Ranking;

class Player {

    const VERSION = "PHP Player 0.2"; // LEAN POKER IS GREAT

    /** @var GameState */
    private $gameState;

    /**
     * @param $gameState
     * @return int
     */
    public function betRequest($gameState) {
        $this->gameState = new GameState($gameState);
        $chance = $this->getChance();

        if ($chance > 0.98) {
            return 23423;
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
        $remainingCardsCount = 5 - count($this->gameState->communityCards);
        $activePlayerCount = $this->gameState->getActivePlayerCount();

        $ranking = new Ranking($cards, $this->gameState->me->holeCards);
        $communityRanking = new Ranking($this->gameState->communityCards);

        $chance = $ranking->getChance($remainingCardsCount);
        $communityChance = $communityRanking->getChance();

        error_log('Chance: '.$chance.' - Community chance: '.$communityChance);

        if ($activePlayerCount > 3) {
            $chance = $chance * 0.95;
        }
        if ($activePlayerCount > 2) {
            $chance = $chance * 0.95;
        }

        if ($communityChance >= $chance) {
            return $chance * 0.7;
        }

        if ($ranking->almostFlush) {
            if ($remainingCardsCount > 1) {
                $chance = $chance + 0.15;
            }
        }

        return $chance;
    }
}
