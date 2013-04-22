<?php

namespace BladeTester\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SettingsController extends Controller {

    /**
     * @Template();
     */
    public function indexAction() {
        return array();
    }
}