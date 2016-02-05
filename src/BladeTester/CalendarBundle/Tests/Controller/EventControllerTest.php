<?php

namespace BladeTester\CalendarBundle\Tests\Controller;


class EventControllerTest extends BaseTestCase {

    public function setUp()
    {
        parent::setUp();
        $this->truncateTables(array('events', 'event_categories'));
    }

    /**
     * @test
     */
    public function IShouldCreateAnEvent()
    {
        // Act
        $this->addAnEventThroughTheUI();

        // Assert
        $this->assertCount(1, $this->calendar->findAll());
    }

    /**
     * @test
     */
    public function IShouldEditAnEvent()
    {
        // Arrange
        $event = $this->calendar->persist($this->getEvent());
        $new_description = 'I have changed the description';

        // Act
        $this->updateAnEventTroughTheUi($event, array('event[description]' => $new_description));

        // Assert
        $event = $this->calendar->find($event->getId());
        $this->assertEquals($new_description, $event->getDescription());
    }


    /**
     * @test
     */
    public function IShouldAssignACategoryToAnEvent()
    {
        // Arrange
        $category = $this->categoryManager->persist($this->categoryManager->createEventCategory());
        $event = $this->calendar->persist($this->getEvent());

        $crawler = $this->visit('calendar_event_edit', array('id' => $event->getId()));
        $form = $crawler->filter('form#event-edit')->form();
        $form['event[category]'] = $category->getId();

        // Act
        $this->client->submit($form);

        // Assert
        $event = $this->calendar->find($event->getId());
        $this->assertNotNull($event->getCategory());
    }



    /**
     * @test
     */
    public function IShouldDeleteAnEvent()
    {
        // Arrange
        $event = $this->calendar->persist($this->getEvent());

        // Act
        $this->visit('calendar_event_delete', array('id' => $event->getId()));

        // Assert
        $this->assertCount(0, $this->calendar->findAll());
    }


    /**
     * @test
     */
    public function IShouldSeeTheEventsList()
    {
        // Arrange
        $in_ten_minutes = array(
            'start' => new \DateTime(date('Y-m-d H:i', strtotime('+10 minutes'))),
            'end' => new \DateTime(date('Y-m-d H:i', strtotime('+15 minutes'))),
        );
        $this->calendar->persist($this->getEvent($in_ten_minutes));
        $this->calendar->persist($this->getEvent($in_ten_minutes));
        $this->calendar->persist($this->getEvent($in_ten_minutes));

        // Act
        $crawler = $this->visit('calendar_event_list');

        // Assert
        $this->assertEquals(3, $crawler->filter('.appointment')->count());
    }

    /**
     * @test
     */
    public function IShouldNotSeePreviousEventsInTheEventsList()
    {
        // Arrange
        $this->calendar->persist($this->getEvent(array('start' => new \DateTime('2001-02-02'),
                                                       'end' => new \DateTime('2001-02-03'))));
        $this->calendar->persist($this->getEvent());
        $this->calendar->persist($this->getEvent());

        // Act
        $crawler = $this->visit('calendar_event_list');

        // Assert
        $this->assertEquals(2, $crawler->filter('.appointment')->count());
    }


    /**
     * @test
     */
    public function IShouldSeeTheEventsInADay()
    {
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
        $this->assertEquals(2, $crawler->filter('.appointment')->count());
    }

    /**
     * @test
     */
    public function IShouldSeeTheEventsInAWeek()
    {
        // Arrange
        $this->calendar->persist($this->getEvent(array('start' => new \DateTime('2013-03-11'))));
        $this->calendar->persist($this->getEvent(array('start' => new \DateTime('2013-03-17'))));
        $this->calendar->persist($this->getEvent(array('start' => new \DateTime('2008-01-01'))));

        // Act
        $crawler = $this->visit('calendar_event_list_by_week', array('year' => '2013',
                                                                     'month' => '03',
                                                                     'day' => '15'));

        // Assert
        $this->assertEquals(2, $crawler->filter('.appointment')->count());
    }

    /**
     * @test
     */
    public function IShouldSeeTheEventsInAMonth()
    {
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

    /**
     * @test
     */
    public function itDispatchesAnEventWhenAddingARecordInTheCalendar()
    {
        // Act
        $this->addAnEventThroughTheUI();

        // Expect
        $listener = $this->client->getKernel()->getContainer()->get('calendar_test.post_add_listener');
        $this->assertTrue($listener->hasBeenCalled());
    }

    /**
     * @test
     */
    public function itDispatchesAnEventWhenUpdatingARecordFromTheCalendar()
    {
        // Act
        $this->addAnEventThroughTheUI();

        // Expect
        $listener = $this->client->getKernel()->getContainer()->get('calendar_test.post_add_listener');
        $this->assertTrue($listener->hasBeenCalled());
    }

    private function getEvent(array $data = array()) {
        $event = $this->calendar->createEvent();
        $event->setTitle('Some title');
        if (isset($data['start'])) {
            $event->setStart($data['start']);
        }
        if (isset($data['end'])) {
            $event->setEnd($data['end']);
        }
        return $event;
    }

    private function addAnEventThroughTheUI()
    {
        $crawler = $this->visit('calendar_event_add');
        $start_date = new \DateTime();
        $end_date = $start_date->add(date_interval_create_from_date_string('1 hour'));
        $form = $crawler->filter('form#event-add')->form();
        $form['event[title]'] = 'This is a test creating an event';
        $this->client->submit($form);
    }

    private function updateAnEventTroughTheUi($event, array $fields_changed = array())
    {
        $crawler = $this->visit('calendar_event_edit', array('id' => $event->getId()));
        $form = $crawler->filter('form#event-edit')->form();
        foreach ($fields_changed as $key => $value) {
            $form[$key] = $value;
        }
        $this->client->submit($form);
    }
}
