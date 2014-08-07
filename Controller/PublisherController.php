<?php

namespace FDevs\CRUDBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FDevs\CRUDBundle\Entity\Publisher;
use FDevs\CRUDBundle\Form\PublisherType;

/**
 * Publisher controller.
 *
 */
class PublisherController extends Controller
{

    /**
     * Lists all Publisher entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FDevsCRUDBundle:Publisher')->findAll();

        return $this->render('FDevsCRUDBundle:Publisher:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Publisher entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Publisher();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('publisher_show', array('id' => $entity->getId())));
        }

        return $this->render('FDevsCRUDBundle:Publisher:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Publisher entity.
     *
     * @param Publisher $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Publisher $entity)
    {
        $form = $this->createForm(new PublisherType(), $entity, array(
            'action' => $this->generateUrl('publisher_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Publisher entity.
     *
     */
    public function newAction()
    {
        $entity = new Publisher();
        $form   = $this->createCreateForm($entity);

        return $this->render('FDevsCRUDBundle:Publisher:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Publisher entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FDevsCRUDBundle:Publisher')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Publisher entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FDevsCRUDBundle:Publisher:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Publisher entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FDevsCRUDBundle:Publisher')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Publisher entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FDevsCRUDBundle:Publisher:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Publisher entity.
    *
    * @param Publisher $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Publisher $entity)
    {
        $form = $this->createForm(new PublisherType(), $entity, array(
            'action' => $this->generateUrl('publisher_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Publisher entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FDevsCRUDBundle:Publisher')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Publisher entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('publisher_edit', array('id' => $id)));
        }

        return $this->render('FDevsCRUDBundle:Publisher:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Publisher entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FDevsCRUDBundle:Publisher')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Publisher entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('publisher'));
    }

    /**
     * Creates a form to delete a Publisher entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('publisher_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
