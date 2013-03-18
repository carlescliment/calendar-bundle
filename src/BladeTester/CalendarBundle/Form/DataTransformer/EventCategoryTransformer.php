<?php

namespace BladeTester\CalendarBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

use BladeTester\CalendarBundle\Model\EventCategoryManager;

class EventCategoryTransformer implements DataTransformerInterface {

    private $manager;


    public function __construct(EventCategoryManager $manager) {
        $this->manager = $manager;
    }


    public function transform($category) {
        if (null === $category) {
            return '';
        }
        return $category->getId();
    }


    public function reverseTransform($id) {
        if (!$id) {
            return null;
        }
        return $this->manager->find($id);
    }

}
