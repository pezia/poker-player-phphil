<?php

namespace Ranking;

/**
 * Description of Hand
 *
 * @author zsolt
 */
class Hand {

    const NOTHING = 0;
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

    public static $suits = array(Hand::SPADES, Hand::HEARTS, Hand::CLUBS, Hand::DIAMONDS);
    public static $rankHandlerClasses = array(
        //Hand::STRAIGHT_FLUSH => '\Ranking\Handler\StraightFlush',
        Hand::FOUR_OF_A_KIND => '\Ranking\Handler\FourOfAKind',
        Hand::FULL_HOUSE => '\Ranking\Handler\FullHouse',
        Hand::FLUSH => '\Ranking\Handler\Flush',
        Hand::STRAIGHT => '\Ranking\Handler\Straight',
        Hand::THREE_OF_A_KIND => '\Ranking\Handler\ThreeOfAKind',
        Hand::TWO_PAIRS => '\Ranking\Handler\TwoPairs',
        Hand::PAIR => '\Ranking\Handler\Pair',
    );
    private $cards;

    public function __construct(array $cards = array()) {
        $this->cards = $cards;
    }

    public function getRank() {
        foreach (self::$rankHandlerClasses as $rank => $class) {
            $handler = new $class();
            if($handler->doesMatch($this->cards)) {
                return $rank;
            }
        }
        
        return 0;
    }
}
