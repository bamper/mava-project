<?php
namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Task;

class LoadTasks extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $task1 = new Task();
        $task1->setTitle('writing chapter 1');
        $task1->setDescription('descriptions for writing ch1');
        $task1->setDueDate(new \DateTime('2014-10-14'));
        $task1->setProject($manager->merge($this->getReference('project-symfony')));
        $task1->setUser($manager->merge($this->getReference('user-john')));

        $task2 = new Task();
        $task2->setTitle('reviewing chapter 1');
        $task2->setDescription('descriptions for reviewing ch1');
        $task2->setDueDate(new \DateTime('2014-10-16'));
        $task2->setProject($manager->merge($this->getReference('project-symfony')));
        $task2->setUser($manager->merge($this->getReference('user-jack')));

        $task3 = new Task();
        $task3->setTitle('editing chapter 1');
        $task3->setDescription('descriptions for editing ch1');
        $task3->setDueDate(new \DateTime('2014-10-18'));
        $task3->setProject($manager->merge($this->getReference('project-symfony')));
        $task3->setUser($manager->merge($this->getReference('user-jack')));

        $manager->persist($task1);
        $manager->persist($task2);
        $manager->persist($task3);
        $manager->flush();
    }
    public function getOrder()
    {
        return 40; // the order in which fixtures will be loaded
    }
}