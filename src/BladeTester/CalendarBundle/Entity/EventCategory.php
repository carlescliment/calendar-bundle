<?php

namespace BladeTester\CalendarBundle\Entity;

use BladeTester\CalendarBundle\Model\EventCategory as BaseEventCategory;

class EventCategory extends BaseEventCategory
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }
}
