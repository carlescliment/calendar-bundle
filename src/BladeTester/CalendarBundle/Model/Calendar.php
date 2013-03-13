<?php

namespace BladeTester\CalendarBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;


class Calendar implements CalendarInterface {


    private $eventClass;
    private $om;

    public function __construct(ObjectManager $om, $event_class) {
        $this->om = $om;
        $this->eventClass = $event_class;
    }

    public function createEvent() {
        return new $this->eventClass();
    }

    public function findAll() {
        $repository = $this->om->getRepository($this->eventClass);
        return $repository->findAll();
    }

    public function persist(EventInterface $event) {
        $this->om->persist($event);
        $this->om->flush();
        return $this;
    }
}