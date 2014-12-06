<?php

namespace Ranking;

use \Ranking\Hand;
use \Model\Card;

/**
 * Description of PairTest
 *
 * @author zsolt
 */
class HandTest extends \Codeception\TestCase\Test {

    public function testPair() {
        $cards = array(
            new Card(Hand::SPADES, 2),
            new Card(Hand::DIAMONDS, 3),
            new Card(Hand::DIAMONDS, 4),
            new Card(Hand::DIAMONDS, 2),
        );

        $hand = new Hand($cards);
        
        $this->assertEquals(Hand::PAIR, $hand->getRank());
    }

    public function testTwoPairs() {
        $cards = array(
            new Card(Hand::SPADES, 2),
            new Card(Hand::DIAMONDS, 3),
            new Card(Hand::DIAMONDS, 3),
            new Card(Hand::DIAMONDS, 2),
            new Card(Hand::DIAMONDS, 4),
        );

        $hand = new Hand($cards);
        
        $this->assertEquals(Hand::TWO_PAIRS, $hand->getRank());
    }

    public function testThreeOfAKind() {
        $cards = array(
            new Card(Hand::SPADES, 2),
            new Card(Hand::DIAMONDS, 3),
            new Card(Hand::DIAMONDS, 1),
            new Card(Hand::DIAMONDS, 2),
            new Card(Hand::DIAMONDS, 2),
        );

        $hand = new Hand($cards);
        
        $this->assertEquals(Hand::THREE_OF_A_KIND, $hand->getRank());
    }

}
