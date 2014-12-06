<?php

namespace Ranking\Handler;

/**
 * Description of Flush
 *
 * @author zsolt
 */
class Flush {

    public function match(array $cards) {
        $suitCounts = array();

        foreach ($cards as $card) {
            $suitCounts[$card->suit] = isset($suitCounts[$card->suit]) ? $suitCounts[$card->suit] + 1 : 1;
        }

        foreach ($suitCounts as $count) {
            if ($count >= 5) {
                return true;
            }
        }

        return false;
    }

}
