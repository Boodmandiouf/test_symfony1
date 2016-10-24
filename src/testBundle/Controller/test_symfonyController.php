<?php

namespace testBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use testBundle\Entity\test_symfony;
use testBundle\Form\test_symfonyType;

/**
 * test_symfony controller.
 *
 */
class test_symfonyController extends Controller
{
    /**
     * Lists all test_symfony entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $test_symfonies = $em->getRepository('testBundle:test_symfony')->findAll();

        return $this->render('testBundle:test_symfony/index.html.twig', array(
            'test_symfonies' => $test_symfonies,
        ));
    }

    /**
     * Creates a new test_symfony entity.
     *
     */
    public function newAction(Request $request)
    {
        $test_symfony = new test_symfony();
        $form = $this->createForm('testBundle\Form\test_symfonyType', $test_symfony);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($test_symfony);
            $em->flush();

            return $this->redirectToRoute('test_symfony_show', array('id' => $test_symfony->getId()));
        }

        return $this->render('testBundle:test_symfony/index.html.twig', array(
            'test_symfony' => $test_symfony,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a test_symfony entity.
     *
     */
    public function showAction(test_symfony $test_symfony)
    {
        $deleteForm = $this->createDeleteForm($test_symfony);

        return $this->render('testBundle:test_symfony/index.html.twig', array(
            'test_symfony' => $test_symfony,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing test_symfony entity.
     *
     */
    public function editAction(Request $request, test_symfony $test_symfony)
    {
        $deleteForm = $this->createDeleteForm($test_symfony);
        $editForm = $this->createForm('testBundle\Form\test_symfonyType', $test_symfony);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($test_symfony);
            $em->flush();

            return $this->redirectToRoute('test_symfony_edit', array('id' => $test_symfony->getId()));
        }

        return $this->render('testBundle:test_symfony/index.html.twig', array(
            'test_symfony' => $test_symfony,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a test_symfony entity.
     *
     */
    public function deleteAction(Request $request, test_symfony $test_symfony)
    {
        $form = $this->createDeleteForm($test_symfony);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($test_symfony);
            $em->flush();
        }

        return $this->redirectToRoute('test_symfony_index');
    }

    /**
     * Creates a form to delete a test_symfony entity.
     *
     * @param test_symfony $test_symfony The test_symfony entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(test_symfony $test_symfony)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('test_symfony_delete', array('id' => $test_symfony->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
