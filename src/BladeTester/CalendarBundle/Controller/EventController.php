<?php

namespace BladeTester\CalendarBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BladeTester\CalendarBundle\Model\EventCollection,
    BladeTester\CalendarBundle\Model\DatesTransformer,
    BladeTester\CalendarBundle\Model\CalendarViews;

class EventController extends BaseController {

    public function indexAction(Request $request)
    {
        $calendar = $this->getCalendar();
        $default_view = $calendar->getDefaultView();
        return $this->redirect($this->createRouteForDefaultView($default_view));
    }

    private function createRouteForDefaultView($default_view) {
        $year = strftime('%Y');
        $month = strftime('%m');
        $day = strftime('%d');
        switch ($default_view) {
            case CalendarViews::MONTH:
                return $this->generateUrl('calendar_event_list_by_month', array('year' => $year, 'month' => $month));
            case CalendarViews::WEEK:
                return $this->generateUrl('calendar_event_list_by_week', array('year' => $year, 'month' => $month, 'day' => $day));
            case CalendarViews::DAY:
                return $this->generateUrl('calendar_event_list_by_day', array('year' => $year, 'month' => $month, 'day' => $day));
        }
        return $this->generateUrl('calendar_event_list');
    }


    /**
     * @Template()
     */
    public function addAction(Request $request)
    {
        $calendar = $this->getCalendar();
        $event = $calendar->createEvent();
        $this->setDefaultDatesFromRequest($event, $request);
        $form_instance = $this->get('blade_tester_calendar.forms.event');
        $form = $this->createForm($form_instance, $event);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $calendar->persist($event);
            $this->addFlashMessage('bladetester_calendar.flash.event_added', array('%title%' => $event->getTitle()));
            return $this->redirectFromRequest($request);
        }
        return array(
            'form' => $form->createView()
            );
    }


    private function setDefaultDatesFromRequest($event, Request $request) {
        $event->setStart($this->getStartDateFromRequest($request));
        $end = clone($event->getStart());
        $end->add(date_interval_create_from_date_string('1 hour'));
        $event->setEnd($end);
    }


    private function getStartDateFromRequest(Request $request) {
        $date = new \DateTime;
        $year = $request->get('year') ? $request->get('year') : $date->format('Y');
        $month = $request->get('month') ? $request->get('month') : $date->format('m');
        $day = $request->get('day') ? $request->get('day') : $date->format('d');
        $date->setDate($year, $month ,$day);
        $hour = is_null($request->get('hour')) ? '09' : $request->get('hour');
        $minute = $request->get('minute') ? $request->get('minute') : '00';
        $date->setTime($hour, $minute);
        return $date;
    }


    /**
     * @Template()
     */
    public function editAction($id, Request $request)
    {
        $event = $this->loadEventOr404($id);
        $form_instance = $this->get('blade_tester_calendar.forms.event');
        $form = $this->createForm($form_instance, $event);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $this->getCalendar()->update($event);
            $this->addFlashMessage('bladetester_calendar.flash.event_updated', array('%title%' => $event->getTitle()));
            return $this->redirectFromRequest($request);
        }
        return array(
            'form' => $form->createView(),
            'event' => $event
            );
    }

    public function deleteAction($id, Request $request) {
        $event = $this->loadEventOr404($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($event);
        $em->flush();
        $this->addFlashMessage('bladetester_calendar.flash.event_deleted', array('%title%' => $event->getTitle()));
        return $this->redirectFromRequest($request);
    }


    /**
     * @Template()
     */
    public function listAction()
    {
        $events = $this->getCalendar()->findNext();
        $collection = new EventCollection($events);
        return array(
            'events' => $collection,
            'current' => new \DateTime,
        );
    }


    /**
     * @Template
     */
    public function listByDayAction($year, $month, $day) {
        $day = new \DateTime("$year-$month-$day");
        $events = $this->getCalendar()->findAllByDay($day);
        $collection = new EventCollection($events);
        return array(
            'events' => $collection,
            'current' => $day,
            'next' => DatesTransformer::nextDay($day),
            'previous' => DatesTransformer::previousDay($day),
        );
    }


    /**
     * @Template
     */
    public function listByWeekAction($year, $month, $day) {
        $day = new \DateTime("$year-$month-$day");
        $events = $this->getCalendar()->findAllByWeek($day);
        $collection = new EventCollection($events);
        return array(
            'events' => $collection,
            'current' => $day,
            'dates' => $this->getCalendar()->getWeekSheetDays($day),
            'next' => DatesTransformer::nextWeek($day),
            'previous' => DatesTransformer::previousWeek($day),
        );
    }

    /**
     * @Template
     */
    public function listByMonthAction($year, $month) {
        $day = new \DateTime("$year-$month-01");
        $events = $this->getCalendar()->findAllByMonth($day);
        $collection = new EventCollection($events);
        return array(
            'events' => $collection,
            'dates' => $this->getCalendar()->getMonthSheetDays($day),
            'current' => $day,
            'next' => DatesTransformer::nextMonth($day),
            'previous' => DatesTransformer::previousMonth($day),
        );
    }


    private function getCalendar() {
        return $this->get('blade_tester_calendar.calendar');
    }


    private function loadEventOr404($id) {
        $manager = $this->getCalendar();
        $category = $manager->find($id);
        if (!$category) {
            $message = $this->trans('bladetester_calendar.exception.event_not_found', array('%id%' => $id));
            throw $this->createNotFoundException($message);
        }
        return $category;
    }

}
