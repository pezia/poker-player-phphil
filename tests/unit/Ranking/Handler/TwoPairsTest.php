<?php

namespace Ranking\Handler;

use \Ranking\Hand;
use \Model\Card;

/**
 * Description of PairTest
 *
 * @author zsolt
 */
class TwoPairsTest extends \Codeception\TestCase\Test {

    private $handler;

    public function _before() {
        $this->handler = new TwoPairs();
    }

    public function testDoesMatch() {
        $cards = array(
            new Card(Hand::SPADES, 2),
            new Card(Hand::DIAMONDS, 3),
            new Card(Hand::DIAMONDS, 3),
            new Card(Hand::DIAMONDS, 5),
            new Card(Hand::DIAMONDS, 6),
            new Card(Hand::DIAMONDS, 2),
        );

        $this->assertTrue($this->handler->doesMatch($cards));
    }

    public function testDoesNotMatch() {
        $cards = array(
            new Card(Hand::SPADES, 2),
            new Card(Hand::DIAMONDS, 3),
            new Card(Hand::DIAMONDS, 4),
            new Card(Hand::DIAMONDS, 5),
            new Card(Hand::DIAMONDS, 6),
            new Card(Hand::DIAMONDS, 2),
        );

        $this->assertFalse($this->handler->doesMatch($cards));
    }

}
