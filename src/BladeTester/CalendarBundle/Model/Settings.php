<?php

namespace BladeTester\CalendarBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;


class Settings {

    private $settings = array();

    public function getDefaultView() {
        if (isset($settings['default_view'])) {
            return $settings['default_view'];
        }
        return CalendarViews::MONTH;
    }
}
