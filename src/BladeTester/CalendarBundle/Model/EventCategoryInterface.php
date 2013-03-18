<?php

namespace BladeTester\CalendarBundle\Model;

interface EventCategoryInterface {

    public function getName();
    public function setName($name);

    public function getColor();
    public function setColor($name);
}
