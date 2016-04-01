<?php

namespace BladeTester\CalendarBundle\Model;

interface EventCategoryRepositoryInterface
{
    public function find($id);
    public function findAll();
    public function findOneByName($name);
    public function persist(EventCategoryInterface $event_category);
}
