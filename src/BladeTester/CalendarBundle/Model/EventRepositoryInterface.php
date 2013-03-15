<?php

namespace BladeTester\CalendarBundle\Model;

interface EventRepositoryInterface {

    public function setClass($class);

    public function find($id);

    public function findAll();

    public function findAllByDay(\DateTime $date);

    public function findAllByWeek(\DateTime $date);

    public function findAllByMonth(\DateTime $date);
}