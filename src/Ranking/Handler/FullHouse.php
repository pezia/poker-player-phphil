<?php

namespace Ranking\Handler;

/**
 * Description of FullHouse
 *
 * @author zsolt
 */
class FullHouse {

    public function match(array $cards) {
        $pair = new Pair();
        $threeOfAKind = new ThreeOfAKind();

        return $pair->match($cards) && $threeOfAKind->match($cards);
    }

}
