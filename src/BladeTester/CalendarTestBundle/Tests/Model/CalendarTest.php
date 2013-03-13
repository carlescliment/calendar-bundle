<?php

namespace BladeTester\CalendarBundle\Tests\Model;

use BladeTester\CalendarBundle\Model\Calendar,
    BladeTester\CalendarBundle\Model\EventInterface;

class FakeEvent implements EventInterface {
    public function getTitle() {}

    public function setTitle($title) {}

    public function getDescription() {}

    public function setDescription($description) {}

    public function getStart() {}

    public function setStart(\DateTime $start) {}

    public function getEnd() {}

    public function setEnd(\DateTime $end) {}
}


class CalendarTest extends \PHPUnit_Framework_TestCase {

    private $om;
    private $calendar;
    private $repository;

    public function setUp() {
        $this->om = $this->getMock('Doctrine\Common\Persistence\ObjectManager');
        $this->repository = $this->getMock('Doctrine\Common\Persistence\ObjectRepository');
        $this->om->expects($this->any())
            ->method('getRepository')
            ->will($this->returnValue($this->repository));
        $this->calendar = new Calendar($this->om, 'BladeTester\CalendarBundle\Tests\Model\FakeEvent');
    }

    /**
     * @test
     */
    public function itCreatesEvents() {
        // Arrange

        // Act
        $event = $this->calendar->createEvent();

        // Assert
        $this->assertEquals('BladeTester\CalendarBundle\Tests\Model\FakeEvent', get_class($event));
    }


    /**
     * @test
     */
    public function itBringsAllEvents() {
        // Arrange

        // Expect
        $this->repository->expects($this->once())
            ->method('findAll');

        // Act
        $this->calendar->findAll();
    }

    /**
     * @test
     */
    public function itPersistsEvents() {
        // Arrange
        $event = $this->calendar->createEvent();

        // Expect
        $this->om->expects($this->once())
            ->method('persist')
            ->with($event);

        // Act
        $this->calendar->persist($event);
    }

}