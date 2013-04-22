<?php

namespace BladeTester\CalendarBundle\Entity;

use BladeTester\CalendarBundle\Model\Setting as BaseSetting;


class Setting extends BaseSetting {

    private $id;

    public function getId() {
        return $this->id;
    }
}