<?php

namespace BladeTester\CalendarBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use BladeTester\CalendarBundle\Model\Color;

class CategoryController extends BaseController {

    /**
     * @Template()
     */
    public function listAction()
    {
        $manager = $this->getCategoryManager();
        return array(
            'categories' => $manager->findAll(),
            );
    }


    /**
     * @Template()
     */
    public function addAction(Request $request)
    {
        $manager = $this->getCategoryManager();
        $category = $manager->createEventCategory();
        $form = $this->getFormForCategory($category);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $manager->persist($category);
            $this->addFlashMessage('bladetester_calendar.flash.category_added', array('%name%' => $category->getName()));
            return $this->redirectFromRequest($request);
        }
        return array(
            'form' => $form->createView(),
            'colors' => Color::getAll(),
            'category' => $category,
            );
    }


    /**
     * @Template()
     */
    public function editAction($id, Request $request)
    {
        $category = $this->loadCategoryOr404($id);
        $form = $this->getFormForCategory($category);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlashMessage('bladetester_calendar.flash.category_aupdated', array('%name%' => $category->getName()));
            return $this->redirectFromRequest($request);
        }
        return array(
            'form' => $form->createView(),
            'colors' => Color::getAll(),
            'category' => $category,
            );
    }


    public function deleteAction($id, Request $request)
    {
        $category = $this->loadCategoryOr404($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($category);
        $em->flush();
        $this->addFlashMessage('bladetester_calendar.flash.category_deleted', array('%name%' => $category->getName()));
        return $this->redirectFromRequest($request);
    }


    private function getCategoryManager()
    {
        return $this->get('blade_tester_calendar.event_category_manager');
    }


    private function getFormForCategory($category) {
        $form_instance = $this->get('blade_tester_calendar.forms.category');
        return $this->createForm($form_instance, $category);
    }

    private function loadCategoryOr404($id) {
        $manager = $this->getCategoryManager();
        $category = $manager->find($id);
        if (!$category) {
            $message = $this->trans('bladetester_calendar.exception.category_not_found', array('%id%' => $id));
            throw $this->createNotFoundException($message);
        }
        return $category;
    }
}
