<?php

namespace BladeTester\CalendarBundle\Repository;

use BladeTester\CalendarBundle\Model\EventInterface;

interface EventRepositoryInterface
{
    public function find($id);
    public function findAll();
    public function findNext();
    public function findBetween(\DateTime $start, \DateTime $end);
    public function findAllByDay(\DateTime $date);
    public function findAllByWeek(\DateTime $date);
    public function findAllByMonth(\DateTime $date);
    public function persist(EventInterface $event);
}
