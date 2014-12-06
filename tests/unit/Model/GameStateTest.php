<?php
namespace Model;

use Codeception\Util\Debug;

class GameStateTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testMe()
    {
        $json = file_get_contents('tests/_data/gamestate.json');
        $json = preg_replace('~//.*$~m', '', $json);
        $gs = json_decode($json, true);
        new GameState($gs);
    }

}