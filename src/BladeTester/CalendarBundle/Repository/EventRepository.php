<?php

namespace BladeTester\CalendarBundle\Repository;

use Doctrine\ORM\EntityRepository;
use BladeTester\CalendarBundle\Model\DatesTransformer,
    BladeTester\CalendarBundle\Model\EventInterface;

class EventRepository extends EntityRepository implements EventRepositoryInterface
{
    public function findAll()
    {
        $q = $this->getEntityManager()
                    ->createQuery("SELECT e
                                   FROM {$this->getEntityName()} e
                                   ORDER BY e.start ASC, e.end ASC");
        return $q->getResult();
    }

    public function findNext()
    {
        $q = $this->getEntityManager()
                    ->createQuery("SELECT e
                                   FROM {$this->getEntityName()} e
                                   WHERE e.end >= :now
                                   ORDER BY e.start ASC, e.end ASC")
                    ->setParameter(':now', new \DateTime);
        return $q->getResult();
    }

    public function findBetween(\DateTime $start, \DateTime $end)
    {
        $q = $this->getEntityManager()
                    ->createQuery("SELECT e
                                   FROM {$this->getEntityName()} e
                                   WHERE e.start >= :start
                                   AND e.end <= :end
                                   ORDER BY e.start ASC, e.end ASC")
                    ->setParameter(':start', $start)
                    ->setParameter(':end', $end);
        return $q->getResult();
    }

    public function findAllByDay(\DateTime $date)
    {
        $start = new \DateTime($date->format('Y-m-d 00:00'));
        $end = new \DateTime($date->format('Y-m-d 23:59:59'));
        return $this->findAllByDates($start, $end);
    }

    public function findAllByWeek(\DateTime $date)
    {
        $monday = DatesTransformer::toMonday($date)->setTime(0, 0);
        $sunday = DatesTransformer::toSunday($date)->setTime(23, 59, 59);
        return $this->findAllByDates($monday, $sunday);
    }

    public function findAllByMonth(\DateTime $date)
    {
        $start = DatesTransformer::toFirstMonthDay($date)->setTime(0, 0);
        $end = DatesTransformer::toLastMonthDay($date)->setTime(23, 59, 59);
        return $this->findAllByDates($start, $end);
    }

    public function findAllByDates(\DateTime $start, \DateTime $end)
    {
        $q = $this->getEntityManager()->createQuery("SELECT e
                                     FROM {$this->getEntityName()} e
                                     WHERE e.start >= :start AND e.start <= :end
                                     ORDER BY e.start ASC, e.end ASC")
                ->setParameter('start', $start)
                ->setParameter('end', $end);
        return $q->getResult();
    }

    public function persist(EventInterface $event)
    {
        $this->getEntityManager()->persist($event);
    }
}
