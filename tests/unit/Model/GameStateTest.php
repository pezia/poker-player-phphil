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
    
    protected function _before()
    {
        $json = file_get_contents('tests/_data/gamestate.json');
        $json = preg_replace('~//.*$~m', '', $json);
        $this->gs = json_decode($json, true);
    }

    protected function _after()
    {
    }

    // tests
    public function testConstruct()
    {
        $gameState = new GameState($this->gs);
        
        $this->assertCount(3, $gameState->players);
    }

    public function testRanks() {
        $gameState = new GameState($this->gs);
        $gameState->getRank();
    }
}