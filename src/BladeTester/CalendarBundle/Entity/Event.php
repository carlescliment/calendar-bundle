<?php

namespace BladeTester\CalendarBundle\Entity;

use BladeTester\CalendarBundle\Model\Event as BaseEvent;

class Event extends BaseEvent
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }
}
