<?php
/**
 * Created by PhpStorm.
 * User: balazs.sandor
 * Date: 06/12/14
 * Time: 11:51
 */

namespace Model;

class Ranking {

    public $pairs = 0;
    public $drill = 0;
    public $poker = 0;
    public $flush = 0;
    public $almostFlush = 0;
    private $rankAvg;


    public function __construct($cards, $rankingCards = array()) {
        $this->rankAvg = $this->getRank($rankingCards);

        $rankCounts = array();
        $suitCounts = array();
        foreach ($cards as $card) {
            $count = isset($rankCounts[$card->rank]) ? $rankCounts[$card->rank] : 0 ;
            $rankCounts[$card->rank] = $count + 1;

            $count = isset($suitCounts[$card->suit]) ? $suitCounts[$card->suit] : 0 ;
            $suitCounts[$card->suit] = $count + 1;
        }
        foreach ($rankCounts as $count) {
            if ($count > 3) {
                $this->poker++;
            }
            if ($count === 3) {
                $this->drill++;
            }
            if ($count === 2) {
                $this->pairs++;
            }
        }
        foreach ($suitCounts as $count) {
            if ($count > 4) {
                $this->flush++;
            }
            if ($count === 4) {
                $this->almostFlush++;
            }
        }
    }

    public function getChance($remainingCardsCount = 0) {
        error_log('rank: '.$this->rankAvg);
        error_log('pairs: '.$this->pairs);
        error_log('drill: '.$this->drill);
        error_log('poker: '.$this->poker);

        $rankMul = $this->rankMul();

        if ($this->poker > 0) {
            return 1;
        }
        if ($this->drill > 0 && $this->pairs > 0) {
            // full
            return 1;
        }
        if ($this->flush > 0) {
            return 0.7;
        }
        if ($this->drill > 0) {
            return 0.6 * $rankMul;
        }
        if ($this->almostFlush > 0 && $remainingCardsCount === 2) {
            return 0.5;
        }
        if ($this->pairs > 1) {
            return 0.4 * $rankMul;
        }
        if ($this->almostFlush > 0 && $remainingCardsCount === 1) {
            return 0.4;
        }
        if ($this->pairs > 0) {
            return 0.3 * $rankMul;
        }
        if ($this->rankAvg > 8) {
            return 0.25;
        }
        if ($this->rankAvg > 7) {
            return 0.2;
        }
        return 0;
    }

    /**
     * @param Card[] $cards
     * @return float|int
     */
    public function getRank($cards) {
        $sum = 0;
        $num =count($cards);
        if ($num === 0) {
            return 0;
        }
        foreach ($cards  as $card) {
            $sum += $card->getRankScore();
        }
        return $sum/$num;
    }

    private function rankMul() {
        if ($this->rankAvg > 10) {
            return 2;
        }
        if ($this->rankAvg > 9) {
            return 1.5;
        }
        if ($this->rankAvg > 8) {
            return 1.3;
        }
        if ($this->rankAvg > 7) {
            return 1.1;
        }
        return 1;
    }

} 