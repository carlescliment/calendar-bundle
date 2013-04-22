<?php

namespace BladeTester\CalendarBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;


class Settings {

    private $settings = array();

    public function getDefaultView() {
        if (isset($this->settings['default_view'])) {
            return $this->settings['default_view'];
        }
        return CalendarViews::MONTH;
    }

    public function setDefaultView($value) {
        return $this->set('default_view', $value);
    }

    public function set($key, $value) {
        $this->settings[$key] = $value;
        return $this;
    }
}
