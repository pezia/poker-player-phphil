<?php

namespace Model;

class Card {
    public $suit;
    public $rank;

    public $ranks = array(
        2,3,4,5,6,7,8,9,10,
        'J','Q','K','A',
    );

    public function __construct($suit, $rank) {
        $this->suit = $suit;
        $this->rank = $rank;
    }

    public function getRankScore() {
        return array_search($this->rank, $this->ranks);
    }

} 