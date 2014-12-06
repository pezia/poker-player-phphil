<?php
use \AcceptanceTester;

class BasicCest
{
    private $gameState;

    public function _before(AcceptanceTester $I)
    {
        $json = file_get_contents('tests/_data/gamestate.json');
        $this->gameState = preg_replace('~//.*$~m', '', $json);
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->sendPOST('/', array('action' => 'check'));
        $I->seeResponseCodeIs(200);
    }
    public function betRequest(AcceptanceTester $I)
    {
        $I->sendPOST('/', array('action' => 'bet_request', 'game_state'=> $this->gameState));
        $I->seeResponseCodeIs(200);
        $I->seeResponseEquals(370);
    }
}