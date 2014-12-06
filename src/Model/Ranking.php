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

    /**
     * @var GameState
     */
    private $gameState;


    public function __construct(GameState $gameState) {
        $this->gameState = $gameState;

        $rankCounts = array();
        $cards = array_merge($gameState->communityCards, $gameState->me->holeCards);
        foreach ($cards as $card) {
            $count = isset($rankCounts[$card->rank]) ? $rankCounts[$card->rank] : 0 ;
            $rankCounts[$card->rank] = $count + 1;
        }
        foreach ($rankCounts as $rank=>$count) {
            if ($count === 4) {
                $this->poker++;
            }
            if ($count === 3) {
                $this->drill++;
            }
            if ($count === 2) {
                $this->pairs++;
            }
        }
    }


} 