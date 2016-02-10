<?php


use AppBundle\Entity\User;

class DefaultControllerTest extends \Codeception\TestCase\Test
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
    public function testAboutAction()
    {
        $this->assertTrue(true);
    }
}