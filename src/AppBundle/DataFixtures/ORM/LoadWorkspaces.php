<?php
namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Workspace;

class LoadWorkspaces extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $workspace1 = new Workspace();
        $workspace1->setName('Writing');
        $workspace1->setDescription('info for writing Workspace');
        $manager->persist($workspace1);
        $manager->flush();
        $this->addReference('workspace-writing', $workspace1);
    }

    public function getOrder()
    {
        return 10; // the order in which fixtures will be loaded
    }
}