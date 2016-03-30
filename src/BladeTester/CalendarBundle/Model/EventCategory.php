<?php

namespace BladeTester\CalendarBundle\Model;

class EventCategory implements EventCategoryInterface
{
    protected $name = '';
    protected $color = Color::BLACK;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
        return $this;
    }

}
