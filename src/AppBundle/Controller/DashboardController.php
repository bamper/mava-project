<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Cache(smaxage="1800", public="true")
 * @Cache(expires="600")
 */
class DashboardController extends Controller
{
    /**
     * @Cache(ETag="userProjects ~ finishedTasks")
     * @Route("/dashboard", name="dashboard_index")
     */
    public function indexAction()
    {
        $uId = $this->getUser()->getId();
        $util = $this->get('mava_util');
        $userProjects = $util->getUserProjects($uId);
        $currentTasks = $util->getUserTasks($uId, 'in progress');
        
        return $this->render(
            ':dashboard:index.html.twig', array(
            'currentTasks'  => $currentTasks,
            'userProjects'  => $userProjects)
        );
    }
}
