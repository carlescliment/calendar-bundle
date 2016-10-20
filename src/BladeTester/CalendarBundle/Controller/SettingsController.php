<?php

namespace BladeTester\CalendarBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use BladeTester\CalendarBundle\Form\Type\SettingsType;



class SettingsController extends BaseController {

    /**
     * @Template();
     */
    public function indexAction() {
        $calendar = $this->get('blade_tester_calendar.calendar');
        $settings = $calendar->getSettings();
        $form = $this->createForm(SettingsType::class, $settings);
        return array('form' => $form->createView());
    }

    public function updateAction(Request $request) {
        $calendar = $this->get('blade_tester_calendar.calendar');
        $settings = $calendar->getSettings();
        $form = $this->createForm(SettingsType::class, $settings);
        $form->handleRequest($request);
        $calendar->updateSettings($settings);
        $this->getDoctrine()->getManager()->flush();
        $this->addFlashMessage('bladetester_calendar.flash.settings_updated');
        return $this->redirect($this->generateUrl('calendar_settings'));
    }

}
