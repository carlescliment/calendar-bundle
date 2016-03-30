<?php

namespace BladeTester\CalendarBundle\Factory;

class EventFactory implements EventFactoryInterface
{
    private $eventClass;

    public function __construct($event_class)
    {
        $this->eventClass = $event_class;
    }

    public function build()
    {
        $event = new $this->eventClass();
        $now = new \DateTime;
        $event->setStart($now);
        $event->setEnd($now);

        return $event;
    }

    public function getEventClass()
    {
        return $this->eventClass;
    }
}
