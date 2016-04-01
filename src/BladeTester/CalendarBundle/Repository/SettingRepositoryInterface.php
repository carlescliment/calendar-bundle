<?php

namespace BladeTester\CalendarBundle\Repository;

use BladeTester\CalendarBundle\Model\Settings;

interface SettingRepositoryInterface
{
    public function getSettings();
    public function updateSettings(Settings $settings);
}
