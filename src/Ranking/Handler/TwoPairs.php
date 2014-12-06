<?php

namespace Ranking\Handler;

/**
 * Description of Pair
 *
 * @author zsolt
 */
class TwoPairs {

    public function match(array $cards) {
        $rankCounts = array();

        foreach ($cards as $card) {
            $rankCounts[$card->rank] = isset($rankCounts[$card->rank]) ? $rankCounts[$card->rank] + 1 : 1;
        }

        krsort($rankCounts);

        $numPairs = 0;

        foreach ($rankCounts as $rank => $count) {
            if ($count === 2) {
                $numPairs++;
            }
        }

        return $numPairs >= 2;
    }

}
