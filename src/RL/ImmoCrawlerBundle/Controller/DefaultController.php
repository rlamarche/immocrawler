<?php

namespace RL\ImmoCrawlerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $entries = $this->getDoctrine()
                    ->getRepository('RLImmoCrawlerBundle:Property')
                    ->findAll();
        
        return $this->render('RLImmoCrawlerBundle:Default:index.html.twig', array (
            'entries' => $entries
        ));
    }
}
