<?php

namespace BladeTester\CalendarBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;


class Calendar implements CalendarInterface {


    private $eventClass;
    private $om;

    public function __construct(ObjectManager $om, $event_class) {
        $this->om = $om;
        $this->eventClass = $event_class;
        $this->setRepositoryClass();
    }

    public function createEvent() {
        $event = new $this->eventClass();
        $now = new \DateTime;
        $event->setStart($now);
        $event->setEnd($now);
        return $event;
    }

    public function findAll() {
        return $this->getRepository()->findAll();
    }

    public function findAllByDay($date) {
        return $this->getRepository()->findAllByDay($date);
    }

    public function findAllByWeek($date) {
        return $this->getRepository()->findAllByWeek($date);
    }

    public function findAllByMonth($date) {
        return $this->getRepository()->findAllByMonth($date);
    }

    public function persist(EventInterface $event) {
        $this->om->persist($event);
        $this->om->flush();
        return $this;
    }

    private function getRepository() {
        return $this->om->getRepository($this->eventClass);
    }

    private function setRepositoryClass() {
        $this->getRepository()->setClass($this->eventClass);
    }
}