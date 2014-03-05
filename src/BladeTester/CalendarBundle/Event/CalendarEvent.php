<?php

namespace BladeTester\CalendarBundle\Event;

use Symfony\Component\EventDispatcher\Event;

use BladeTester\CalendarBundle\Model\EventInterface;

class CalendarEvent extends Event {

    protected $event;

    public function __construct(EventInterface $event) {
        $this->event = $event;
    }

    public function getEvent() {
        return $this->event;
    }

}