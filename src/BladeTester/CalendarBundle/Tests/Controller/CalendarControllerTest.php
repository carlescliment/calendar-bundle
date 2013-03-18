<?php

namespace BladeTester\CalendarBundle\Tests\Controller;

class CalendarControllerTest extends BaseTestCase {

    public function setUp() {
        parent::setUp();
        $this->truncateTables(array('events'));
    }

    /**
     * @test
     */
    public function itShowsAMiniCalendar() {
        // Arrange

        // Act
        $crawler = $this->visit('calendar_mini_calendar', array('month' => '03', 'year' => '2013'));

        // Assert
        $this->assertEquals(1, $crawler->filter('#mini-calendar')->count());
        $this->assertEquals(35, $crawler->filter('#mini-calendar .day')->count());
    }
}
