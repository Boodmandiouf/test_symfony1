<?php

namespace testBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use testBundle\Entity\Myentity;
use testBundle\Form\MyentityType;

/**
 * Myentity controller.
 *
 */
class MyentityController extends Controller
{
    /**
     * Lists all Myentity entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $myentities = $em->getRepository('testBundle:Myentity')->findAll();

        return $this->render('myentity/index.html.twig', array(
            'myentities' => $myentities,
        ));
    }

    /**
     * Creates a new Myentity entity.
     *
     */
    public function newAction(Request $request)
    {
        $myentity = new Myentity();
        $form = $this->createForm('testBundle\Form\MyentityType', $myentity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($myentity);
            $em->flush();

            return $this->redirectToRoute('myentity_show', array('id' => $myentity->getId()));
        }

        return $this->render('myentity/new.html.twig', array(
            'myentity' => $myentity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Myentity entity.
     *
     */
    public function showAction(Myentity $myentity)
    {
        $deleteForm = $this->createDeleteForm($myentity);

        return $this->render('myentity/show.html.twig', array(
            'myentity' => $myentity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Myentity entity.
     *
     */
    public function editAction(Request $request, Myentity $myentity)
    {
        $deleteForm = $this->createDeleteForm($myentity);
        $editForm = $this->createForm('testBundle\Form\MyentityType', $myentity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($myentity);
            $em->flush();

            return $this->redirectToRoute('myentity_edit', array('id' => $myentity->getId()));
        }

        return $this->render('myentity/edit.html.twig', array(
            'myentity' => $myentity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Myentity entity.
     *
     */
    public function deleteAction(Request $request, Myentity $myentity)
    {
        $form = $this->createDeleteForm($myentity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($myentity);
            $em->flush();
        }

        return $this->redirectToRoute('myentity_index');
    }

    /**
     * Creates a form to delete a Myentity entity.
     *
     * @param Myentity $myentity The Myentity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Myentity $myentity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('myentity_delete', array('id' => $myentity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
