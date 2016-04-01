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

    /**
     * @param $taskName
     * @param $taskDesc
     * @param $taskDueDate
     * @param $taskStatus
     * @param null $userId
     * @param null $projectId
     * @return bool
     * @throws \Exception
     */
    public function createTask(
        $taskName,
        $taskDesc,
        $taskDueDate,
        $taskStatus,
        $userId = null,
        $projectId = null
    ){
        $task = new Task();
        $task->setTitle($taskName);
        $task->setDescription($taskDesc);
        $task->setDueDate(new \DateTime($taskDueDate));
        $task->setStatus($taskStatus);
        if($projectId) {
            $project =
                $this->em->getRepository('AppBundle:Project');
            $task->setProject($project->find($project_id));
        }
        if($userId) {
            $user = $this->em->getRepository('AppBundle:User');
            $task->setUser($user->find($useId));
        }
        try {
            $this->em->persist($task);
            $this->em->flush();
            return true;
        } catch (\Exception $e) {
            throw $e;
        }
    }

}
