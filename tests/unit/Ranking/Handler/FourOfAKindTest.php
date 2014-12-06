<?php

namespace Ranking\Handler;

use \Ranking\Hand;
use \Model\Card;

/**
 * Description of FourOfAKindTest
 *
 * @author zsolt
 */
class FourOfAKindTest extends \Codeception\TestCase\Test {

    private $handler;

    public function _before() {
        $this->handler = new FourOfAKind();
    }

    public function testDoesMatch() {
        $cards = array(
            new Card(Hand::SPADES, 2),
            new Card(Hand::DIAMONDS, 2),
            new Card(Hand::DIAMONDS, 2),
            new Card(Hand::DIAMONDS, 5),
            new Card(Hand::DIAMONDS, 6),
            new Card(Hand::DIAMONDS, 2),
        );

        $this->assertTrue($this->handler->doesMatch($cards));
    }

    public function testDoesNotMatch() {
        $cards = array(
            new Card(Hand::SPADES, 2),
            new Card(Hand::DIAMONDS, 2),
            new Card(Hand::DIAMONDS, 2),
            new Card(Hand::DIAMONDS, 2),
            new Card(Hand::DIAMONDS, 2),
        );

        $this->assertFalse($this->handler->doesMatch($cards));
    }

}
