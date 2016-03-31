<?php

namespace BladeTester\CalendarBundle\Model;

interface EventRepositoryInterface
{
    public function findAll();
    public function findNext();
    public function findBetween(\DateTime $start, \DateTime $end);
    public function findAllByDay(\DateTime $date);
    public function findAllByWeek(\DateTime $date);
    public function findAllByMonth(\DateTime $date);
    public function persist(EventInterface $event);
    public function flush();
}
