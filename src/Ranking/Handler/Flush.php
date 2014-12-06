<?php

namespace Ranking\Handler;

/**
 * Description of Flush
 *
 * @author zsolt
 */
class Flush {

    public function doesMatch(array $cards) {
        $suitCounts = array();

        foreach ($cards as $card) {
            $suitCounts[$card->suit] = isset($suitCounts[$card->suit]) ? $suitCounts[$card->suit] + 1 : 1;
        }

        foreach ($suitCounts as $count) {
            if ($count >= 4) {
                return true;
            }
        }

        return false;
    }

}