<?php

namespace Model;

class GameState {

    private $players;

    public function __construct($gameState = array()) {
        $this->initPlayers($gameState['players']);
    }

    private function initPlayers($players) {
        $this->players = array_map(
            function($p) {
                return new Player($p);
            },
            $players
        );
    }


} 