<?php

namespace BladeTester\CalendarBundle\Model;

class EventCollection {

    private $events;


    public function __construct(array $events = array()) {
        $this->events = $events;
    }

    public function add(EventInterface $event) {
        $this->events[] = $event;
    }

    public function getAll() {
        return $this->events;
    }

    public function getAllByDate(\DateTime $date) {
        $date_events = array();
        foreach ($this->events as $event) {
            if ($event->getStart()->format('Y-m-d') == $date->format('Y-m-d')) {
                $date_events[] = $event;
            }
        }
        return $date_events;
    }

    public function getDates() {
        $dates = array();
        foreach ($this->events as $event) {
            if (!isset($dates[$event->getStart()->format('Y-m-d')])) {
                $dates[$event->getStart()->format('Y-m-d')] = $event->getStart();
            }
        }
        return array_values($dates);
    }
}