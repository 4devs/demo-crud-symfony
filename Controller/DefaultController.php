<?php

namespace FDevs\CRUDBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name = 'Andrey')
    {
        return $this->render('FDevsCRUDBundle:Default:index.html.twig', array('name' => $name));
    }
}
