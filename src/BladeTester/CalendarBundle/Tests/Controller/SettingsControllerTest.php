<?php

namespace BladeTester\CalendarBundle\Tests\Controller;

use BladeTester\CalendarBundle\Model\CalendarViews;

class SettingsControllerTest extends BaseTestCase {

    public function setUp() {
        parent::setUp();
        $this->truncateTables(array('calendar_settings'));
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


    /**
     * @test
     */
    public function itAllowsChangingTheDefaultView() {
        // Arrange
        $crawler = $this->visit('calendar_settings');
        $form = $crawler->filter('form#calendar-settings')->form();
        $form['calendar_settings[defaultView]'] = CalendarViews::WEEK;

        // Act
        $this->client->submit($form);

        // Assert
        $default_view = $this->calendar->getDefaultView();
        $this->assertEQuals($default_view, CalendarViews::WEEK);
    }
}
