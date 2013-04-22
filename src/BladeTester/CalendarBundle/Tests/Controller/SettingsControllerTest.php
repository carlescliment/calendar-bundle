<?php

namespace BladeTester\CalendarBundle\Tests\Controller;

class SettingsControllerTest extends BaseTestCase {

    public function setUp() {
        parent::setUp();
        // $this->truncateTables(array('calendar_settings'));
    }

    /**
     * @test
     */
    public function itShowsASettingsPanel() {
        // Arrange

        // Act
        $crawler = $this->visit('calendar_settings');

        // Assert
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }
}
