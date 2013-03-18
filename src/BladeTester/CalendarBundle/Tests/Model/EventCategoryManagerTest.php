<?php

namespace BladeTester\CalendarBundle\Tests\Model;

use BladeTester\CalendarBundle\Model\EventCategoryManager,
    BladeTester\CalendarBundle\Model\EventCategory;

class FakeEventCategory extends EventCategory {}



class EventCategoryManagerTest extends \PHPUnit_Framework_TestCase {

    private $om;
    private $manager;
    private $repository;

    public function setUp() {
        $this->om = $this->getMock('Doctrine\Common\Persistence\ObjectManager');
        $this->repository = $this->getMock('BladeTester\CalendarBundle\Model\EventCategoryRepositoryInterface');
        $this->om->expects($this->any())
            ->method('getRepository')
            ->will($this->returnValue($this->repository));
        $this->manager = new EventCategoryManager($this->om, 'BladeTester\CalendarBundle\Tests\Model\FakeEventCategory');
    }


    /**
     * @test
     */
    public function itCreatesEventCategories() {
        // Arrange

        // Act
        $category = $this->manager->createEventCategory();

        // Assert
        $this->assertEquals('BladeTester\CalendarBundle\Tests\Model\FakeEventCategory', get_class($category));
    }


    /**
     * @test
     */
    public function itPersistsEventCategories() {
        // Arrange
        $category = $this->manager->createEventCategory();

        // Expect
        $this->om->expects($this->once())
            ->method('persist')
            ->with($category);

        // Act
        $this->manager->persist($category);
    }


    /**
     * @test
     */
    public function itBringsAllEventCategories() {
        // Arrange

        // Expect
        $this->repository->expects($this->once())
            ->method('findAll');

        // Act
        $this->manager->findAll();
    }


    /**
     * @test
     */
    public function itBringsOneByName() {
        // Arrange
        $name = 'Search name';

        // Expect
        $this->repository->expects($this->once())
            ->method('findOneByName')
            ->with($name);

        // Act
        $this->manager->findOneByName($name);
    }

    /**
     * @test
     */
    public function itBringsOneById() {
        // Arrange
        $id = 45;

        // Expect
        $this->repository->expects($this->once())
            ->method('find')
            ->with($id);

        // Act
        $this->manager->find($id);
    }
}