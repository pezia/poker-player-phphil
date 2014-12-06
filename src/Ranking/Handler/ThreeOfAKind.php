<?php

namespace Ranking\Handler;

/**
 * Description of ThreeOfAKind
 *
 * @author zsolt
 */
class ThreeOfAKind {

    public function doesMatch(array $cards) {
        $rankCounts = array();

        foreach ($cards as $card) {
            $rankCounts[$card->rank] = isset($rankCounts[$card->rank]) ? $rankCounts[$card->rank] + 1 : 1;
        }

        krsort($rankCounts);
        
        foreach ($rankCounts as $rank => $count) {
            if ($count === 3) {
                return true;
            }
        }

        return false;
    }

}
