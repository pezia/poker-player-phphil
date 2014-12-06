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
}