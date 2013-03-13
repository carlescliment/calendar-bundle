<?php

namespace BladeTester\CalendarTestBundle\Entity;

use BladeTester\CalendarBundle\Entity\Event as BaseEvent;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="events")
 * @ORM\Entity
 */
class Event extends BaseEvent {

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

}