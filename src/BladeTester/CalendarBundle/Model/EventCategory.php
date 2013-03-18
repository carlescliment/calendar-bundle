<?php

namespace BladeTester\CalendarBundle\Model;

class EventCategory implements EventCategoryInterface {

    protected $name;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

}