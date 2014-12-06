<?php


class PlayerTest extends \Codeception\TestCase\Test {
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before() {
    }

    protected function _after() {
    }

    /**
     * @param $communityChance
     * @param $chance
     * @param $expected
     * @dataProvider chanceProvider
     */
    public function test($communityChance, $chance, $expected) {
        $this->assertEquals($expected, $communityChance >= $chance);
    }

    public function chanceProvider() {
        return array(
            array(0.5, 0.5, true),
            array(0.6, 0.5, true),
            array(0.5, 0.5001, false),
        );
    }

}