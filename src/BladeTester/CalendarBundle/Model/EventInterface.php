<?php

namespace BladeTester\CalendarBundle\Model;

interface EventInterface {

    public function getTitle();

    public function setTitle($title);

    public function getDescription();

    public function setDescription($description);

    public function getStart();

    public function setStart(\DateTime $start);

    public function getEnd();

    public function setEnd(\DateTime $end);

}