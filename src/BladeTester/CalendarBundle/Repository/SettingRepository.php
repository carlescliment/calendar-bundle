<?php

namespace BladeTester\CalendarBundle\Repository;

use Doctrine\ORM\EntityRepository;
use BladeTester\CalendarBundle\Model\Settings;

class SettingRepository Extends EntityRepository {

    public function getSettings() {
        $settings_class = new Settings;
        $settings = $this->findAll();
        foreach ($settings as $setting) {
            $settings_class->set($setting->getName(), $setting->getValue());
        }
        return $settings_class;
    }
}