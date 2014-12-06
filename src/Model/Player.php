<?php

namespace Model;

class Player {

    public $id;
    public $name;
    public $status;
    public $version;
    public $stack;
    public $bet;
    public $holeCards;

    public static function fromInputData($playerData) {
        $player = new Player();

        $player->id = $playerData['id'];
        $player->name = $playerData['name'];
        $player->status = $playerData['status'];
        $player->version = $playerData['version'];

        $player->stack = $playerData['stack'];
        $player->bet = $playerData['bet'];
        $player->holeCards = array(); //$playerData['hole_cards'];

        return $player;
    }

}
