<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class WorkspaceController extends Controller
{
    /**
     * @Route("/workspace/{name}", name="workspace_show")
     * @param $workspace
     * @return Response
     */
    public function showAction($name)
    {
        // ToDO: find workspace projects via given workspace name
        return $this->render('workspace/show.html.twig', array('project' => '$project'));


    }
}
