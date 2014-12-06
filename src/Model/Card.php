<?php

namespace Model;

class Card {
    public $suit;
    public $rank;

    public function __construct($suit, $rank) {
        $this->suit = $suit;
        $this->rank = $rank;
    }

} 