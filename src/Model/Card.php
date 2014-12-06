<?php

namespace Model;

class Card {

    public $suit;
    public $rank;
    public $ranks = array(
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8,
        9 => 9,
        10 => 10,
        'J' => 11,
        'Q' => 12,
        'K' => 13,
        'A' => 14,
    );

    public function __construct($suit, $rank) {
        $this->suit = $suit;
        $this->rank = isset($this->ranks[$rank]) ? $this->ranks[$rank] : $rank;
    }

    public function getRankScore() {
        return $this->rank - 2;
    }

}
