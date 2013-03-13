<?php

namespace BladeTester\CalendarTestBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class EventControllerTest extends WebTestCase {

    private $em;
    private $router;
    private $client;
    private $calendar;

    public function setUp() {
        $this->client = self::createClient(array(), array("PHP_AUTH_USER" => "test", "PHP_AUTH_PW"   => "test",));
        $container = $this->client->getKernel()->getContainer();
        $this->router = $container->get('router');
        $this->em = $container->get('doctrine.orm.entity_manager');
        $this->calendar = $container->get('blade_tester_calendar.calendar');
        $this->truncateTables(array('events'));
    }

    /**
     * @test
     */
    public function IShouldCreateAnEvent() {
        // Arrange
        $crawler = $this->visit('calendar_event_add');
        $start_date = new \DateTime();
        $end_date = $start_date->add(date_interval_create_from_date_string('1 hour'));
        $form = $crawler->filter('form#event-add input[type="submit"]')->form();
        $form['event[title]'] = 'This is a test creating an event';

        // Act
        $this->client->submit($form);

        // Assert
        $this->assertCount(1, $this->calendar->findAll());
    }


    /**
     * @test
     */
    public function IShouldSeeTheEventsList() {
        // Arrange
        $this->calendar->persist($this->getEvent());
        $this->calendar->persist($this->getEvent());
        $this->calendar->persist($this->getEvent());

        // Act
        $crawler = $this->visit('calendar_event_list');

        // Assert
        $this->assertEquals(3, $crawler->filter('.appointment')->count());
    }


    /**
     * @test
     */
    public function IShouldSeeTheEventsInADay() {
        // Arrange
        $today = new \DateTime();
        $this->calendar->persist($this->getEvent(array('start' => $today)));
        $this->calendar->persist($this->getEvent(array('start' => $today)));
        $this->calendar->persist($this->getEvent(array('start' => new \DateTime('2008-01-01'))));

        // Act
        $crawler = $this->visit('calendar_event_list_by_day', array('year' => $today->format('Y'),
                                                                    'month' => $today->format('m'),
                                                                    'day' => $today->format('d')));

        // Assert
        $this->assertEquals(2, $crawler->filter('.event')->count());
    }

    /**
     * @test
     */
    public function IShouldSeeTheEventsInAWeek() {
        // Arrange
        $this->calendar->persist($this->getEvent(array('start' => new \DateTime('2013-03-11'))));
        $this->calendar->persist($this->getEvent(array('start' => new \DateTime('2013-03-17'))));
        $this->calendar->persist($this->getEvent(array('start' => new \DateTime('2008-01-01'))));

        // Act
        $crawler = $this->visit('calendar_event_list_by_week', array('year' => '2013',
                                                                     'month' => '03',
                                                                     'day' => '15'));

        // Assert
        $this->assertEquals(2, $crawler->filter('.event')->count());
    }

    /**
     * @test
     */
    public function IShouldSeeTheEventsInAMonth() {
        // Arrange
        $this->calendar->persist($this->getEvent(array('start' => new \DateTime('2013-03-11'))));
        $this->calendar->persist($this->getEvent(array('start' => new \DateTime('2013-03-17'))));
        $this->calendar->persist($this->getEvent(array('start' => new \DateTime('2013-04-17'))));
        $this->calendar->persist($this->getEvent(array('start' => new \DateTime('2008-01-01'))));

        // Act
        $crawler = $this->visit('calendar_event_list_by_month', array('year' => '2013',
                                                                      'month' => '03'));

        // Assert
        $this->assertEquals(2, $crawler->filter('.appointment')->count());
    }

    private function getEvent(array $data = array()) {
        $event = $this->calendar->createEvent();
        if (isset($data['start'])) {
            $event->setStart($data['start']);
        }
        return $event;
    }

    private function visit($route_name, array $arguments = array()) {
        $route = $this->router->generate($route_name, $arguments);
        return $this->client->request('GET', $route);
    }

    private function printContents() {
        print $this->client->getResponse()->getContent();
    }

    private function truncateTables(array $tables) {
        $connection = $this->em->getConnection();
        $platform = $connection->getDatabasePlatform();
        $connection->query("SET foreign_key_checks = 0");
        foreach ($tables as $table) {
            $connection->executeUpdate($platform->getTruncateTableSQL($table));
        }
        $connection->query("SET foreign_key_checks = 1");
    }
}