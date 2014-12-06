<?php

class Player {

    const VERSION = "PHP Player 0.1";

    public function betRequest($gameState) {
        return $gameState['current_buy_in'] + 50;
    }

    public function showdown($gameState) {
        
    }

}
