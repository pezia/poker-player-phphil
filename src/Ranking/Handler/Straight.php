<?php

namespace Ranking\Handler;

/**
 * Description of Straight
 *
 * @author zsolt
 */
class Straight {

    public function match(array $cards) {
        $rankCounts = array();

        foreach ($cards as $card) {
            $rankCounts[$card->rank] = isset($rankCounts[$card->rank]) ? $rankCounts[$card->rank] + 1 : 1;
        }

        krsort($rankCounts);

        $countInStraight = 0;
        $prevRank = 0;
        $topRank = 0; // later

        foreach (array_keys($rankCounts) as $rank) {
            if ($prevRank - $rank == 1) {
                $countInStraight++;
            } else {
                $countInStraight = 1;
                $topRank = $rank;
            }
            
            $prevRank = $rank;

            if ($countInStraight == 5) {
                return true;
            }
        }

        return false;
    }

}
