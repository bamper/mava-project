<?php

namespace Mava\CoreBundle\Util;
use Doctrine\ORM\EntityManagerInterface;

class Mava {
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function wsFinishedTasks($wsID)
    {
        $projects = $this->wsAllProjects($wsID);
        $taskRepo = $this->em->getRepository('CoreBundle:Task');
        $total = 0;
        foreach ($projects as $project){
            $total += count($taskRepo->getFinishedTasks($project->getId()));
        }
        return $total;
    }

    public function wsNewTasks($wsID)
    {
        $projects = $this->wsAllProjects($wsID);;
        $taskRepo = $this->em->getRepository('CoreBundle:Task');
        $total = 0;
        foreach ($projects as $project){
            $total += count($taskRepo->getNewTasks($project->getId()));
        }
        //ToDo
        return $total;
    }

    public function wsCurrentTasks($wsID)
    {
        // ToDo find current tasks in this workspace
    }

    public function wsAllProjects($wsID){
        return $this->em
            ->getRepository('CoreBundle:Project')
            ->getAllProjects($wsID);
    }
}
