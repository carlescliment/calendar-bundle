<?php

namespace BladeTester\CalendarBundle\Model;

interface EventCategoryRepositoryInterface {

    public function setClass($class);

    public function find($id);
    public function findAll();
    public function findOneByName($name);
}
