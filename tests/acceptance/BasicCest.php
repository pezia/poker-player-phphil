<?php
use \AcceptanceTester;

class BasicCest {
    private $gameState;

    public function _before(AcceptanceTester $I) {
        $json = file_get_contents('tests/_data/gamestate.json');
        $this->gameState = preg_replace('~//.*$~m', '', $json);
    }

    public function _after(AcceptanceTester $I) {
    }

    public function check(AcceptanceTester $I) {
        $I->sendPOST('/', array('action' => 'check'));
        $I->seeResponseCodeIs(200);
    }

    public function betRequestCall(AcceptanceTester $I) {
        $I->sendPOST('/', array('action' => 'bet_request', 'game_state' => $this->getGameState('gamestate.json')));
        $I->seeResponseCodeIs(200);
        $I->seeResponseEquals(240);
    }
    public function betRequestDrill(AcceptanceTester $I) {
        $I->sendPOST('/', array('action' => 'bet_request', 'game_state' => $this->getGameState('allin.json')));
        $I->seeResponseCodeIs(200);
        $I->seeResponseEquals(23423);
    }

    /**
     * @return string
     */
    private function getGameState($file) {
        $json = file_get_contents('tests/_data/'.$file);
        $json = preg_replace('~//.*$~m', '', $json);
        return $json;
    }
}