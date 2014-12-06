<?php

namespace Model;

class Player {

    public $id;
    public $name;
    public $status;
    public $version;
    public $stack;
    public $bet;

    /** @var  Card[] */
    public $holeCards = array();

    public static function fromInputData($playerData) {
        $player = new Player();

        $player->id = $playerData['id'];
        $player->name = $playerData['name'];
        $player->status = $playerData['status'];
        $player->version = $playerData['version'];

        $player->stack = $playerData['stack'];
        $player->bet = $playerData['bet'];

        if (isset($playerData['hole_cards'])) {
            $player->initCards($playerData['hole_cards']);
        }

        return $player;
    }

    public function initCards(array $communityCards) {
        $this->holeCards = array_map(
                function ($c) {
            return new Card($c['suit'], $c['rank']);
        }, $communityCards
        );
    }

}
