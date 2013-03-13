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
        $calendar = $this->getCalendar();
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
        return array(
            'events' => $this->getCalendar()->findAll()
        );
    }


    /**
     * @Template
     */
    public function listByDayAction($year, $month, $day) {
        $day = new \DateTime("$year-$month-$day");
        return array(
            'events' => $this->getCalendar()->findAllByDay($day)
        );
    }


    /**
     * @Template
     */
    public function listByWeekAction($year, $month, $day) {
        $day = new \DateTime("$year-$month-$day");
        return array(
            'events' => $this->getCalendar()->findAllByWeek($day)
        );
    }

    /**
     * @Template
     */
    public function listByMonthAction($year, $month) {
        $day = new \DateTime("$year-$month-01");
        return array(
            'events' => $this->getCalendar()->findAllByMonth($day)
        );
    }


    private function getCalendar() {
        return $this->get('blade_tester_calendar.calendar');
    }


}
