<?php

namespace BladeTester\CalendarBundle\Repository;

use Doctrine\ORM\EntityRepository;
use BladeTester\CalendarBundle\Model\EventRepositoryInterface;

class EventRepository Extends EntityRepository implements EventRepositoryInterface {

    private $class;

    public function setClass($class) {
        $this->class = $class;
    }

    public function findAll() {
        $q = $this->getEntityManager()->createQuery("SELECT e
                                     FROM $this->class e
                                     ORDER BY e.start ASC, e.end ASC");
        return $q->getResult();
    }

    public function findAllByDay(\DateTime $date) {
        $start = new \DateTime($date->format('Y-m-d 00:00'));
        $end = new \DateTime($date->format('Y-m-d 23:59'));
        $q = $this->getEntityManager()->createQuery("SELECT e
                                     FROM $this->class e
                                     WHERE e.start >= :start AND e.end <= :end
                                     ORDER BY e.start ASC, e.end ASC")
                ->setParameter('start', $start)
                ->setParameter('end', $end);
        return $q->getResult();
    }

}