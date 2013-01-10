<?php

namespace Socialgeo\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Socialgeo\EventBundle\Entity\Enquiry;

use Socialgeo\EventBundle\Form\EnquiryType;

class ContactController extends Controller
{
    public function indexAction(Request $request)
    {

        // create a task and give it some dummy data for this example
        $task = new Enquiry();

        $form = $this->createFormBuilder($task)
                ->add('name')
                ->add('email', 'email')
                ->add('subject')
                ->add('body', 'textarea')
            ->getForm();

        if ($request->isMethod('POST'))
        {
            $form->bind($request);

            if($form->isValid() )
            {

            }

        }




        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate');


        $data = array('csrf_generated' => $csrfToken, 'form' => $form->createView() );

        return $this->render('EventBundle:Contact:contact.html.twig', $data );
    }



}
