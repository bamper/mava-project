<?php


class DashboardControllerCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function testShowAction(FunctionalTester $I)
    {
        $I->wantTo('too see inside the dashboard area');
        $I->amOnPage('/dashboard');
        $I->see('a placeholder for dashboard');
    }
}
