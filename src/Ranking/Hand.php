<?php

namespace Ranking;

/**
 * Description of Hand
 *
 * @author zsolt
 */
class Hand {

    const PAIR = 1;
    const TWO_PAIRS = 2;
    const THREE_OF_A_KIND = 3;
    const STRAIGHT = 4;
    const FLUSH = 5;
    const FULL_HOUSE = 6;
    const FOUR_OF_A_KIND = 7;
    const STRAIGHT_FLUSH = 8;
    
    
    const SPADES = 'spades';
    const HEARTS = 'hearts';
    const CLUBS = 'clubs';
    const DIAMONDS = 'diamonds';

    public $suits = array(Hand::SPADES, Hand::HEARTS, Hand::CLUBS, Hand::DIAMONDS);
    
    public $rankHandlers = array(
            //Hand::PAIR => new Handler\Pair(),
    );

}
