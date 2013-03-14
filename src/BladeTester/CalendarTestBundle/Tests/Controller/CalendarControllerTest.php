<?php

namespace BladeTester\CalendarTestBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class CalendarControllerTest extends WebTestCase {

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
    public function itShowsAMiniCalendar() {
        // Arrange

        // Act
        $crawler = $this->visit('calendar_mini_calendar', array('month' => '03', 'year' => '2013'));

        // Assert
        $this->assertEquals(1, $crawler->filter('#mini-calendar')->count());
        $this->assertEquals(35, $crawler->filter('#mini-calendar .day')->count());
    }

    private function visit($route_name, array $arguments = array(), array $get = array(), $async = false) {
        $headers = array();
        if ($async) {
            $headers = array('HTTP_X-Requested-With' => 'XMLHttpRequest');
        }
        $route = $this->router->generate($route_name, $arguments);
        return $this->client->request('GET', $route, $get, array(), $headers);
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