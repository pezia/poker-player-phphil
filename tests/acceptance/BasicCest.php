<?php
use \AcceptanceTester;

class BasicCest
{
    public function _before(AcceptanceTester $I)
    {
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
        $I->sendPOST('/', array('action' => 'bet_request'));
        $I->seeResponseCodeIs(200);
        $I->seeResponseEquals(50);
    }
}