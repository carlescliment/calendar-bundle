<?php

namespace BladeTester\CalendarBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class EventController extends Controller {

    /**
     * @Template()
     */
    public function addAction(Request $request)
    {
        $calendar = $this->get('blade_tester_calendar.calendar');
        $event = $calendar->createEvent();
        $form_instance = $this->get('blade_tester_calendar.forms.event');
        $form = $this->createForm($form_instance, $event);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $calendar->persist($event);
                return $this->redirect($this->generateUrl('calendar_event_list'));
            }
        }
        return array(
            'form' => $form->createView()
            );
    }


    /**
     * @Template()
     */
    public function listAction()
    {
        $calendar = $this->get('blade_tester_calendar.calendar');
        return array(
            'events' => $calendar->findAll()
        );

    }

}
