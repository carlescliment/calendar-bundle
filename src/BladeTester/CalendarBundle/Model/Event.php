<?php

namespace BladeTester\CalendarBundle\Model;

class Event implements EventInterface {

    private $title;
    private $description;
    private $start;
    private $end;

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function getStart() {
        return $this->start;
    }

    public function setStart(\DateTime $start) {
        $this->start = $start;
        return $this;
    }

    public function getEnd() {
        return $this->end;
    }

    public function setEnd(\DateTime $end) {
        $this->end = $end;
        return $this;
    }

}