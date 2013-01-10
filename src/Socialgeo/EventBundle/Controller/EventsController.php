<?php

namespace Socialgeo\EventBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Socialgeo\EventBundle\Entity\Events;
use Socialgeo\UserBundle\Entity\User;
use Socialgeo\EventBundle\Form\EventsType;

/**
 * Events controller.
 *
 */
class EventsController extends Controller
{
    /**
     * Lists all Events entities.
     *
     */
    public function indexAction($district)
    {

        $user = $this->get('security.context')->getToken()->getUser();


        $entities = $user->getEvents();

        return $this->render('EventBundle:Events:index.html.twig', array(
            'entities' => $entities, 'district' => $district
        ));
    }

    /**
     * Lists all Events entities.
     *
     */
    public function districtAction($district)
    {

        $user = $this->get('security.context')->getToken()->getUser();


        $entities = $user->getEvents();

        return $this->render('EventBundle:Events:districtevents.html.twig', array(
            'entities' => $entities, 'district' => $district
        ));
    }

    /**
     * Finds and displays a Events entity.
     *
     */
    public function showAction($id, $district)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EventBundle:Events')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Events entity.');
        }

        $deleteForm = $this->createDeleteForm($id, $district);

        return $this->render('EventBundle:Events:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'district' => $district
                                                        ));
    }

    /**
     * Displays a form to create a new Events entity.
     *
     */
    public function newAction($district)
    {

        $entity = new Events();
        $entity->setDistrictId(1);
        $form   = $this->createForm(new EventsType(), $entity);


        return $this->render('EventBundle:Events:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'district' => $district
        ));
    }

    /**
     * Creates a new Events entity.
     *
     */
    public function createAction(Request $request, $district)
    {


        $entity  = new Events();
        $form = $this->createForm(new EventsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $entity->setOwner($this->getUser());

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('events_show', array('id' => $entity->getId(), 'district' => $district  )));
        }

        return $this->render('EventBundle:Events:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'district'   => $district
        ));
    }

    /**
     * Displays a form to edit an existing Events entity.
     *
     */
    public function editAction($id, $district)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EventBundle:Events')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Events entity.');
        }

        $editForm = $this->createForm(new EventsType(), $entity);
        $deleteForm = $this->createDeleteForm($id, $district);

        return $this->render('EventBundle:Events:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'district'    => $district
        ));
    }

    /**
     * Edits an existing Events entity.
     *
     */
    public function updateAction(Request $request, $id, $district)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EventBundle:Events')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Events entity.');
        }

        $deleteForm = $this->createDeleteForm($id, $district    );
        $editForm = $this->createForm(new EventsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('events_edit', array('id' => $id)));
        }

        return $this->render('EventBundle:Events:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'district'    => $district
        ));
    }

    /**
     * Deletes a Events entity.
     *
     */
    public function deleteAction(Request $request, $id, $district)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EventBundle:Events')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Events entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('events'));
    }

    private function createDeleteForm($id, $district)
    {
        return $this->createFormBuilder(array('id' => $id,'distrcit'=> $district ))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
 }
