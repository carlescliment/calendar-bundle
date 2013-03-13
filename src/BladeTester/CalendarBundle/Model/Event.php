<?php

namespace BladeTester\CalendarBundle\Model;

class Event implements EventInterface {

    protected $title = '';
    protected $description = '';
    protected $start;
    protected $end;

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
        if (!is_null($description)) {
            $this->description = $description;
        }
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