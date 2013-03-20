<?php

namespace BladeTester\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use BladeTester\CalendarBundle\Model\Color;

class CategoryController extends Controller {

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
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $manager->persist($category);
                return $this->redirectFromRequest($request);
            }
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
        $manager = $this->getCategoryManager();
        $category = $manager->find($id);
        $form = $this->getFormForCategory($category);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectFromRequest($request);
            }
        }
        return array(
            'form' => $form->createView(),
            'colors' => Color::getAll(),
            'category' => $category,
            );
    }


    public function deleteAction($id, Request $request)
    {
        $manager = $this->getCategoryManager();
        $category = $manager->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($category);
        $em->flush();
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

    private function redirectFromRequest(Request $request) {
        $redirect = $request->server->get("HTTP_REFERER");
        if ($request->get('destination')) {
            $redirect = $request->get('destination');
        }
        return $this->redirect($redirect);
    }
}