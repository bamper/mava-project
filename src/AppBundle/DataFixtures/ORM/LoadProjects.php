<?php
namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Project;

class LoadProjects extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $project1 = new Project();
        $project1->setTitle('Symfony book');
        $project1->setDescription('Some descriptions for Symfony book project');
        $project1->setDueDate(new \DateTime('2014-10-20'));
        $project1->setWorkspace($manager->merge($this->getReference('workspace-writing')));
        $manager->persist($project1);
        $manager->flush();
        $this->addReference('project-symfony', $project1);
    }

    public function getOrder()
    {
        return 20; // the order in which fixtures will be loaded
    }
}