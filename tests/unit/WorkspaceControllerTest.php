<?php

class WorkspaceControllerTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var \Helper\Unit
     */
    private $helper;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testShowAction()
    {

//        $this->helper->seeResponseContains('Symfony book');
//        $this->tester->assertContains()
//        $title = $this->tester
//            ->grabFromDatabase('project', 'title', array('workspace_id'=>'1'));
        $title = $this->tester->grabFromRepository(
            'AppBundle:Project',
            'title',
            array('workspace'=>'1')
        );
        $this->assertEquals('Symfony book', $title, 'no match found');

        $this->tester->amOnRoute('workspace_show', array('name' => 'Writing'));
        $this->tester->seeResponseContains('Symfony book');
    }
}