<?php

namespace BladeTester\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BladeTester\CalendarBundle\Form\Type\SettingsType;


class SettingsController extends Controller {

    /**
     * @Template();
     */
    public function indexAction() {
        $calendar = $this->get('blade_tester_calendar.calendar');
        $settings = $calendar->getSettings();
        $settings_form = new SettingsType;
        $form = $this->createForm($settings_form, $settings);
        return array('form' => $form->createView());
    }
}