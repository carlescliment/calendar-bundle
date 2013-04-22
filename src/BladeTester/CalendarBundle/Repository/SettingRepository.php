<?php

namespace BladeTester\CalendarBundle\Repository;

use Doctrine\ORM\EntityRepository;

use BladeTester\CalendarBundle\Model\Settings,
    BladeTester\CalendarBundle\Entity\Setting;

class SettingRepository Extends EntityRepository {

    public function getSettings() {
        $settings_class = new Settings;
        $settings = $this->findAll();
        foreach ($settings as $setting) {
            $settings_class->set($setting->getName(), $setting->getValue());
        }
        return $settings_class;
    }

    public function updateSettings(Settings $settings) {
        $em = $this->getEntityManager();
        $default_view = $this->findOneByName('default_view');
        if (!$default_view) {
            $default_view = new Setting();
            $default_view->setName('default_view');
            $em->persist($default_view);
        }
        $default_view->setValue($settings->getDefaultView());
        $em->flush();
    }
}