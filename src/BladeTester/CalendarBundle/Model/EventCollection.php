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

    public function count() {
        return count($this->events);
    }

    public function getAll() {
        return $this->events;
    }

    public function getAllByDate(\DateTime $date) {
        return $this->filterByDateFormat('Y-m-d', $date);
    }

    public function getAllByDateAndTime(\DateTime $date, $hour) {
        $date_events = array();
        $check_date = clone($date);
        $check_date->setTime($hour, 0);
        return $this->filterByDateFormat('Y-m-d H', $check_date);
    }

    private function filterByDateFormat($format, $date) {
        $date_events = array();
        foreach ($this->events as $event) {
            if ($event->getStart()->format($format) == $date->format($format)) {
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