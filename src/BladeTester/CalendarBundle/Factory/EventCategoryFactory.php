<?php

namespace BladeTester\CalendarBundle\Factory;

class EventCategoryFactory implements EventCategoryFactoryInterface
{
    private $eventCategoryClass;

    public function __construct($event_category_class)
    {
        $this->eventCategoryClass = $event_category_class;
    }

    public function build()
    {
        return new $this->eventCategoryClass;
    }
}
