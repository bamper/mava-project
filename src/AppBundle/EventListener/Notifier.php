<?php
namespace CoreBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Workspace;
use AppBundle\Entity\Task;
use AppBundle\Entity\Team;
use AppBundle\Entity\Project;
use AppBundle\Entity\Notification;

class Notifier {
    private $subject;
    private $body;
    private $user;
    private $em;
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $this->em = $args->getEntityManager();
        $this->notifyRelatedUsers($entity);
    }

    public function notifyRelatedUsers($entity)//, $em)
    {
        if ($entity instanceof Task){
            $this->subject = $entity->getTitle();
            $this->body    = "updates available for task: ".$entity->getTitle();
            $this->user    = $entity->getUser();
        }
        $this->addNewNotification();
    }

    public function addNewNotification()
    {
        $manager = $this->em;
        $notification = new Notification();
        $notification->setSubject($this->subject);
        $notification->setBody($this->body);
        $notification->setUser($this->user);
        $manager->persist($notification);
        $manager->flush();
        return new Response('notification id '.$notification->getId().' successfully created');
    }

}