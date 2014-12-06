<?php

namespace Model;

class Card {
    private $suit;
    private $rank;

    public function __construct($suit, $rank) {
        $this->suit = $suit;
        $this->rank = $rank;
    }

} 