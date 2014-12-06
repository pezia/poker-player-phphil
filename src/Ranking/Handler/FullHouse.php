<?php

namespace Ranking\Handler;

/**
 * Description of FullHouse
 *
 * @author zsolt
 */
class FullHouse {

    public function doesMatch(array $cards) {
        $pair = new Pair();
        $threeOfAKind = new ThreeOfAKind();

        return $pair->doesMatch($cards) && $threeOfAKind->doesMatch($cards);
    }

}
