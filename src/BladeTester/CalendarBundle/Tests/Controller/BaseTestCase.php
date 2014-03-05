<?php
namespace BladeTester\CalendarBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use BladeTester\CalendarBundle\Tests\App\AppKernel;


class BaseTestCase extends WebTestCase {

    protected $em;
    protected $router;
    protected $client;
    protected $calendar;
    protected $categoryManager;

    public function setUp() {
        $this->client = self::createClient(array(), array("PHP_AUTH_USER" => "test", "PHP_AUTH_PW"   => "test",));
        $container = $this->client->getKernel()->getContainer();
        $this->router = $container->get('router');
        $this->em = $container->get('doctrine.orm.entity_manager');
        $this->calendar = $container->get('blade_tester_calendar.calendar');
        $this->categoryManager = $container->get('blade_tester_calendar.event_category_manager');
    }

    protected static function createKernel(array $options = array())
    {
        return new AppKernel('test', true);
    }

    protected function visit($route_name, array $arguments = array(), array $get = array(), $async = false) {
        $headers = array();
        if ($async) {
            $headers = array('HTTP_X-Requested-With' => 'XMLHttpRequest');
        }
        $route = $this->router->generate($route_name, $arguments);
        return $this->client->request('GET', $route, $get, array(), $headers);
    }

    protected function printContents() {
        print $this->client->getResponse()->getContent();
    }

    protected function truncateTables(array $tables) {
        $connection = $this->em->getConnection();
        $platform = $connection->getDatabasePlatform();
        $connection->query("SET foreign_key_checks = 0");
        foreach ($tables as $table) {
            $connection->executeUpdate($platform->getTruncateTableSQL($table));
        }
        $connection->query("SET foreign_key_checks = 1");
    }

}