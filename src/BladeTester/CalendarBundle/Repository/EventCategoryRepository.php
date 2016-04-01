<?php

namespace BladeTester\CalendarBundle\Repository;

use Doctrine\ORM\EntityRepository;
use BladeTester\CalendarBundle\Model\EventCategoryRepositoryInterface;
use BladeTester\CalendarBundle\Model\EventCategoryInterface;

class EventCategoryRepository Extends EntityRepository implements EventCategoryRepositoryInterface
{
    public function find($id)
    {
        $q = $this->getEntityManager()
                    ->createQuery("SELECT c
                                   FROM {$this->getEntityName()} c
                                   WHERE c.id = :id")
                    ->setParameter(':id', $id);
        return $q->getOneOrNullResult();
    }


    public function findAll()
    {
        $q = $this->getEntityManager()
                    ->createQuery("SELECT c
                                   FROM {$this->getEntityName()} c");
        return $q->getResult();
    }

    public function findOneByName($name)
    {
        $q = $this->getEntityManager()
                    ->createQuery("SELECT c
                                   FROM {$this->getEntityName()} c
                                   WHERE c.name = :name")
                    ->setParameter(':name', $name);
        return $q->getSingleResult();
    }

    public function persist(EventCategoryInterface $event_category)
    {
        $this->getEntityManager()->persist($event_category);
    }
}
