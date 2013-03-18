<?php

namespace BladeTester\CalendarBundle\Model;

interface EventCategoryRepositoryInterface {

    public function setClass($class);

    public function findAll();
}
