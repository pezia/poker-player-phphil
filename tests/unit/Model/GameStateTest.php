<?php
namespace Model;

use Codeception\Util\Debug;

class GameStateTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    private $gs;

    /**
     * @return GameState
     */
    public function getGameState($file) {
        $json = file_get_contents('tests/_data/'.$file);
        $json = preg_replace('~//.*$~m', '', $json);
        $gs = json_decode($json, true);
        $gameState = new GameState($gs);
        return $gameState;
    }

    protected function _before()
    {

    }

    protected function _after()
    {
    }

    // tests
    public function testConstruct()
    {
        $gameState = $this->getGameState('gamestate.json');
        $this->assertCount(3, $gameState->players);
        $this->assertCount(2, $gameState->me->holeCards);
        $this->assertCount(3, $gameState->communityCards);
    }

    public function testRanks() {
        $gameState = $this->getGameState('gamestate.json');
    }
    public function testAllin() {
        $gameState = $this->getGameState('allin.json');
    }
}