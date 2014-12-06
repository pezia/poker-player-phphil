<?php

namespace Model;

class GameState {

    private $players;
    private $communityCards;
    private $currentBuyIn;

    public function __construct($gameState = array()) {
        $this->initPlayers($gameState['players']);
        $this->initCards($gameState['community_cards']);
        $this->currentBuyIn = $gameState['current_buy_in'];
    }

    private function initPlayers($players) {
        $this->players = array_map(
            function($p) {
                return new Player($p);
            },
            $players
        );
    }

    private function initCards($communityCards) {
        $this->communityCards = array_map(
            function($c) {
                return new Card($c['suit'],$c['rank']);
            },
            $communityCards
        );
    }


} 