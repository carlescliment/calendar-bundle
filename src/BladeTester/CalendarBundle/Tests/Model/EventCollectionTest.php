<?php

namespace BladeTester\CalendarBundle\Tests\Model;

use BladeTester\CalendarBundle\Model\Event,
    BladeTester\CalendarBundle\Model\EventCollection;


class EventCollectionTest extends \PHPUnit_Framework_TestCase {

    private $collection;

    public function setUp() {
        $this->collection = new EventCollection;
    }


    /**
     * @test
     */
    public function IShouldSetInitialEventsInConstructor() {
        // Arrange
        $event = new Event;

        // Act
        $collection = new EventCollection(array($event));

        // Assert
        $this->assertCount(1, $collection->getAll());
    }

    /**
     * @test
     */
    public function IShouldAddEvents() {
        // Arrange
        $event = new Event;

        // Act
        $this->collection->add($event);

        // Assert
        $this->assertCount(1, $this->collection->getAll());
    }


    /**
     * @test
     */
    public function itBringsEventCount() {
        // Arrange
        $this->addEventToCollection(array('start' => new \DateTime('2013-03-11')));
        $this->addEventToCollection(array('start' => new \DateTime('2013-03-12')));

        // Act
        $count = $this->collection->count();

        // Assert
        $this->assertEquals(2, $count);
    }

    /**
     * @test
     */
    public function IShouldGetEventsByDate() {
        // Arrange
        $this->addEventToCollection(array('start' => new \DateTime('2013-03-11')));
        $this->addEventToCollection(array('start' => new \DateTime('2013-03-12')));

        // Act
        $events = $this->collection->getAllByDate(new \DateTime('2013-03-11'));

        // Assert
        $this->assertCount(1, $events);
    }

    /**
     * @test
     */
    public function itBringsEventsByDayAndTime() {
        // Arrange
        $this->addEventToCollection(array('start' => new \DateTime('2013-03-03 11:00')));
        $this->addEventToCollection(array('start' => new \DateTime('2013-03-04 06:00')));
        $this->addEventToCollection(array('start' => new \DateTime('2013-03-04 06:00')));
        $this->addEventToCollection(array('start' => new \DateTime('2013-03-04 11:00')));

        // Act
        $events = $this->collection->getAllByDateAndTime(new \DateTime('2013-03-04'), '06');

        // Expect
        $this->assertCount(2, $events);
    }


    /**
     * @test
     */
    public function IShouldGetEventDates() {
        // Arrange
        $this->addEventToCollection(array('start' => new \DateTime('2013-03-11')));
        $this->addEventToCollection(array('start' => new \DateTime('2013-03-11')));
        $this->addEventToCollection(array('start' => new \DateTime('2013-03-12')));

        // Act
        $dates = $this->collection->getDates();

        // Assert
        $this->assertCount(2, $dates);
    }


    private function addEventToCollection(array $data = array()) {
        $event = new Event;
        if (isset($data['start'])) {
            $event->setStart($data['start']);
        }
        $this->collection->add($event);
    }
}