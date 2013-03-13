<?php

namespace BladeTester\CalendarBundle\Repository;

use Doctrine\ORM\EntityRepository;
use BladeTester\CalendarBundle\Model\EventRepositoryInterface;

/**
 * @todo : extract methods to TimeMachine
 */
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
        return $this->findAllByDates($start, $end);
    }

    public function findAllByWeek(\DateTime $date) {
        $monday = $this->toMonday($date)->setTime(0, 0);
        $sunday = $this->toSunday($date)->setTime(0, 0);
        return $this->findAllByDates($monday, $sunday);
    }

    public function findAllByMonth(\DateTime $date) {
        $start = $this->toFirstMonthDay($date)->setTime(0, 0);
        $end = $this->toLastMonthDay($date)->setTime(23, 59);
        return $this->findAllByDates($start, $end);
    }

    public function findAllByDates(\DateTime $start, \DateTime $end) {
        $q = $this->getEntityManager()->createQuery("SELECT e
                                     FROM $this->class e
                                     WHERE e.start >= :start AND e.start <= :end
                                     ORDER BY e.start ASC, e.end ASC")
                ->setParameter('start', $start)
                ->setParameter('end', $end);
        return $q->getResult();
    }

    private function toMonday(\DateTime $date) {
        $givenday = $this->getWeekDay($date);
        if ($givenday == 1) {
            return $date;
        }
        $days_to_remove = $givenday - 1;
        $new_date = clone($date);
        return $new_date->sub(date_interval_create_from_date_string("$days_to_remove days"));
    }

    private function toSunday(\DateTime $date) {
        $givenday = $this->getWeekDay($date);
        if ($givenday == 0) {
            return $date;
        }
        $days_to_add = 7 - $givenday;
        $new_date = clone($date);
        return $new_date->add(date_interval_create_from_date_string("$days_to_add days"));
    }


    private function getWeekDay(\DateTime $date) {
        return date("w", mktime(0, 0, 0, $date->format('m'), $date->format('d'), $date->format('Y')));
    }


    private function toFirstMonthDay(\DateTime $date) {
        return new \DateTime($date->format('Y') . '-' . $date->format('m') . '-01');
    }

    private function toLastMonthDay(\DateTime $date) {
        $first_day = $this->toFirstMonthDay($date);
        $next_month_day = $first_day->add(date_interval_create_from_date_string("1 month"));
        return $next_month_day->sub(date_interval_create_from_date_string("1 day"));
    }

}