<?php


class DashboardControllerCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function testShowAction(AcceptanceTester $I)
    {
        $I->wantTo('too see inside the dashboard area');
        $I->amOnPage('/dashboard');
        $I->see('a placeholder for dashboard');
        $I->wait(3);
    }
}
