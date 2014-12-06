<?php

class Player
{
    const VERSION = "Default PHP folding player";

    public function betRequest($gameState)
    {
        return $gameState->current_buy_in + 50;
    }

    public function showdown($game_state)
    {
    }
}
