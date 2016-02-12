<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Unit extends \Codeception\Module
{
    public function seeResponseContains($text)
    {
        $this->assertContains(
            $text,
            $this->getModule('Symfony2')->_getResponseContent(),
            "response contains"
        );
    }
}
