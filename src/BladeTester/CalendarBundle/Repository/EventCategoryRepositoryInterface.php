<?php

namespace BladeTester\CalendarBundle\Repository;

use BladeTester\CalendarBundle\Model\EventCategoryInterface;

interface EventCategoryRepositoryInterface
{
    public function find($id);
    public function findAll();
    public function findOneByName($name);
    public function persist(EventCategoryInterface $event_category);
}
