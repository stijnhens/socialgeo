<?php

namespace Socialgeo\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PartsController extends Controller
{
    public function loginAction()
    {
        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate');
        $data = array('csrf_generated' => $csrfToken);

        return $this->render('EventBundle:Parts:login.html.twig', $data );

    }
}