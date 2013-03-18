<?php

namespace BladeTester\CalendarBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;


class EventCategoryManager {


    private $eventCategoryClass;
    private $om;

    public function __construct(ObjectManager $om, $category_class) {
        $this->om = $om;
        $this->eventCategoryClass = $category_class;
        $this->setRepositoryClass();
    }

    public function createEventCategory() {
        return new $this->eventCategoryClass();
    }

    public function find($id) {
        return $this->getRepository()->find($id);
    }

    public function findAll() {
        return $this->getRepository()->findAll();
    }

    public function findOneByName($name) {
        return $this->getRepository()->findOneByName($name);
    }

    public function persist(EventCategoryInterface $category) {
        $this->om->persist($category);
        $this->om->flush();
        return $category;
    }

    private function getRepository() {
        return $this->om->getRepository($this->eventCategoryClass);
    }

    private function setRepositoryClass() {
        $this->getRepository()->setClass($this->eventCategoryClass);
    }

    public function getClass() {
        return $this->eventCategoryClass;
    }

}