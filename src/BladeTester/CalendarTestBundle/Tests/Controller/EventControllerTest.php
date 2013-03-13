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