<?php

namespace BladeTester\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CalendarController extends Controller {

    /**
     * @Template()
     */
    public function showMiniAction($year, $month = null)
    {
        if (!$month) {
            $month = strftime('%m');
        }
        $day = new \DateTime("$year-$month-01");
        return array(
            'dates' => $this->getCalendar()->getMonthSheetDays($day),
        );
    }


    private function getCalendar()
    {
        return $this->get('blade_tester_calendar.calendar');
    }
}