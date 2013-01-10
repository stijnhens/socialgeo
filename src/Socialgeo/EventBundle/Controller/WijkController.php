<?php

namespace Socialgeo\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class WijkController extends Controller
{
    public function indexAction()
    {
        $variable = file_get_contents('http://datatank.gent.be/Grondgebied/Wijken.json');
        $json = json_decode($variable, true);


        foreach ($json['Wijken'] as $wijk)
        {
           $array[] = $wijk['wijk'];
        };

        $data = array('wijken' => $array );

        return $this->render('EventBundle:Wijk:wijk.html.twig', $data );
    }

    public function wijkportalAction($naam)
    {

        $wijk = array('naam' => $naam);




        $data = array('wijk' => $wijk);


        return $this->render('EventBundle:Wijk:wijkportal.html.twig', $data );

    }


}
