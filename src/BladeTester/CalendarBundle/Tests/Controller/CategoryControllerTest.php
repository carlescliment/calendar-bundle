<?php

namespace BladeTester\CalendarBundle\Tests\Controller;

use BladeTester\CalendarBundle\Model\Color;

class CategoryControllerTest extends BaseTestCase {


    public function setUp() {
        parent::setUp();
        $this->truncateTables(array('events', 'event_categories'));
    }

    /**
     * @test
     */
    public function IShouldCreateAnEventCategory() {
        // Arrange
        $crawler = $this->visit('calendar_category_add');
        $form = $crawler->filter('form#category-add')->form();
        $form['category[name]'] = 'A sample category';
        $form['category[color]'] = Color::RED;

        // Act
        $this->client->submit($form);

        // Assert
        $categories = $this->categoryManager->findAll();
        $this->assertCount(1, $categories);
    }

    /**
     * @test
     */
    public function IShouldSeeExistingCategories() {
        // Arrange
        $this->categoryManager->persist($this->categoryManager->createEventCategory());
        $this->categoryManager->persist($this->categoryManager->createEventCategory());
        $this->categoryManager->persist($this->categoryManager->createEventCategory());

        // Act
        $crawler = $this->visit('calendar_settings');

        // Assert
        $categories = $crawler->filter('.event-category')->count();
        $this->assertEquals(3, $categories);
    }

    /**
     * @test
     */
    public function IShouldEditAnExistingCategory() {
        // Arrange
        $category = $this->categoryManager->persist($this->categoryManager->createEventCategory());
        $crawler = $this->visit('calendar_category_edit', array('id' => $category->getId()));
        $form = $crawler->filter('form#category-edit')->form();
        $form['category[name]'] = 'Changed';

        // Act
        $this->client->submit($form);

        // Assert
        $category = $this->categoryManager->find($category->getId());
        $this->assertEquals('Changed', $category->getName());
    }

    /**
     * @test
     */
    public function IShouldDeleteAnExistingCategory() {
        // Arrange
        $category = $this->categoryManager->persist($this->categoryManager->createEventCategory());

        // Act
        $crawler = $this->visit('calendar_category_delete', array('id' => $category->getId()));

        // Assert
        $categories = $this->categoryManager->findAll();
        $this->assertCount(0, $categories);
    }

}
