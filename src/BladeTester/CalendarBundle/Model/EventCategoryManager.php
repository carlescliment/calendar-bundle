<?php

namespace BladeTester\CalendarBundle\Model;

use BladeTester\CalendarBundle\Factory\EventCategoryFactoryInterface;

class EventCategoryManager
{

    private $factory;
    private $repository;

    public function __construct(EventCategoryFactoryInterface $factory, EventCategoryRepositoryInterface $repository)
    {
        $this->factory = $factory;
        $this->repository = $repository;
    }

    public function createEventCategory()
    {
        return $this->factory->build();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }

    public function findOneByName($name)
    {
        return $this->repository->findOneByName($name);
    }

    public function persist(EventCategoryInterface $category)
    {
        $this->repository->persist($category);
        $this->repository->flush();

        return $category;
    }
}
