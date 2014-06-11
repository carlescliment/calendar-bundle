<?php

namespace BladeTester\CalendarBundle\Model;

use Symfony\Component\Validator\ExecutionContextInterface;

class Event implements EventInterface {

    protected $title = '';
    protected $description = '';
    protected $start;
    protected $end;
    protected $category;

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

    public function getCategory() {
        return $this->category;
    }

    public function setCategory(EventCategoryInterface $category = null) {
        $this->category = $category;
        return $this;
    }

    public function isValid(ExecutionContextInterface $context) {
        $is_valid = $this->start <= $this->end;
        if (!$is_valid) {
            $context->addViolationAt('end', 'bladetester_calendar.validation.event_dates', array(), null);
        }
    }
}