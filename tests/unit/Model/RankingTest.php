<?php

namespace Model;

use \Ranking\Hand;

/**
 * Description of RankingTest
 *
 * @author zsolt
 */
class RankingTest extends \Codeception\TestCase\Test {
    
    public function testFullHouse() {
        $cards = array(
            new Card(Hand::CLUBS, 3),
            new Card(Hand::SPADES, 3),
            new Card(Hand::HEARTS, 4),
            new Card(Hand::DIAMONDS, 4),
            new Card(Hand::CLUBS, 4),
        );
        
        $ranking = new Ranking($cards);
        
        $this->assertEquals(1, $ranking->getChance());
    }
    
    public function testFourOfAKind() {
        $cards = array(
            new Card(Hand::CLUBS, 3),
            new Card(Hand::SPADES, 4),
            new Card(Hand::HEARTS, 4),
            new Card(Hand::DIAMONDS, 4),
            new Card(Hand::CLUBS, 4),
        );
        
        $ranking = new Ranking($cards);
        
        $this->assertEquals(1, $ranking->getChance());
    }
    
    
    public function testFlush() {
        $cards = array(
            new Card(Hand::DIAMONDS, 3),
            new Card(Hand::DIAMONDS, 4),
            new Card(Hand::DIAMONDS, 4),
            new Card(Hand::DIAMONDS, 4),
            new Card(Hand::DIAMONDS, 2),
        );
        
        $ranking = new Ranking($cards);
        
        $this->assertEquals(0.7, $ranking->getChance());
    }
}
