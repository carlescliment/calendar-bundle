<?php

namespace BladeTester\CalendarBundle\Repository;

use Doctrine\ORM\EntityRepository;
use BladeTester\CalendarBundle\Model\EventCategoryRepositoryInterface;

class EventCategoryRepository Extends EntityRepository implements EventCategoryRepositoryInterface {

    private $class;

    public function setClass($class) {
        $this->class = $class;
    }

    public function find($id) {
        $q = $this->getEntityManager()
                    ->createQuery("SELECT c
                                   FROM $this->class c
                                   WHERE c.id = :id")
                    ->setParameter(':id', $id);
        return $q->getOneOrNullResult();
    }


    public function findAll() {
        $q = $this->getEntityManager()
                    ->createQuery("SELECT c
                                   FROM $this->class c");
        return $q->getResult();
    }

    public function findOneByName($name) {
        $q = $this->getEntityManager()
                    ->createQuery("SELECT c
                                   FROM $this->class c
                                   WHERE c.name = :name")
                    ->setParameter(':name', $name);
        return $q->getSingleResult();
    }
}