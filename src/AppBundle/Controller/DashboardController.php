<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    /**
     * @Cache(expires="next Friday")
     * @Route("/dashboard", name="dashboard_index")
     */
    public function indexAction()
    {
        $uId = $this->getUser()->getId();
//        $util = $this->get('mava_util');
        $userProjects = 6; //$util->getUserProjects($uId);
        $currentTasks= 7; //$util->getUserTasks($uId, 'in progress');

        return $this->render(
            ':dashboard:index.html.twig', array(
            'currentTasks'  => $currentTasks,
            'userProjects'  => $userProjects
        ));
    }
}
