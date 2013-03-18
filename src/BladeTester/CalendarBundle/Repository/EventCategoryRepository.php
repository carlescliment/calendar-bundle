<?php

namespace BladeTester\CalendarBundle\Repository;

use Doctrine\ORM\EntityRepository;
use BladeTester\CalendarBundle\Model\EventCategoryRepositoryInterface;

class EventCategoryRepository Extends EntityRepository implements EventCategoryRepositoryInterface {

    private $class;

    public function setClass($class) {
        $this->class = $class;
    }
}