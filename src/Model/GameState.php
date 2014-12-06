<?php

namespace Model;

class GameState {

    /** @var Player[] */
    public $players;
    /** @var Card[] */
    public $communityCards;
    public $currentBuyIn;
    /** @var Player */
    public $me;

    public function __construct($gameState = array()) {
        if(is_array($gameState['players'])) {
            $this->initPlayers($gameState['players']);
        }
        
        if(is_array($gameState['community_cards'])) {
            $this->initCards($gameState['community_cards']);
        }
        
        $this->currentBuyIn = $gameState['current_buy_in'];

        $this->me = $this->players[$gameState['in_action']];
    }

    private function initPlayers(array $players) {
        $this->players = array_map(
            function($p) {
                return Player::fromInputData($p);
            },
            $players
        );
    }

    private function initCards(array $communityCards) {
        $this->communityCards = array_map(
            function($c) {
                return new Card($c['suit'],$c['rank']);
            },
            $communityCards
        );
    }

    public function getRank() {
        $sum = 0;
        $num =count($this->me->holeCards);
        if ($num === 0) {
            return 0;
        }
        foreach ($this->me->holeCards  as $card) {
            $sum += $card->getRankScore();
        }
        return $sum/$num;
    }


} 