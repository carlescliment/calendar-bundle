<?php

namespace BladeTester\CalendarBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use BladeTester\CalendarBundle\Event\CalendarEvent,
    BladeTester\CalendarBundle\Event\CalendarEvents;
use BladeTester\CalendarBundle\Factory\EventFactoryInterface;

class Calendar implements CalendarInterface {


    private $om;
    private $dispatcher;
    private $settings;
    private $eventFactory;

    public function __construct(
        ObjectManager $om,
        EventDispatcherInterface $dispatcher,
        EventFactoryInterface $event_factory,
        EventRepositoryInterface $event_repository
    )
    {
        $this->om = $om;
        $this->dispatcher = $dispatcher;
        $this->eventFactory = $event_factory;
        $this->eventRepository = $event_repository;
    }

    public function __call($method_name, $arguments)
    {

        return call_user_func_array(array(&$this->eventRepository, $method_name), $arguments);
    }

    public function getSettings()
    {
        return $this->om->getRepository('BladeTesterCalendarBundle:Setting')->getSettings();
    }

    public function updateSettings(Settings $settings)
    {
        return $this->om->getRepository('BladeTesterCalendarBundle:Setting')->updateSettings($settings);
    }

    public function getDefaultView()
    {
        return $this->getSettings()->getDefaultView();
    }

    public function createEvent()
    {
        return $this->eventFactory->build();
    }

    public function persist(EventInterface $event)
    {
        $this->dispatcher->dispatch(CalendarEvents::PRE_PERSIST, new CalendarEvent($event));
        $this->eventRepository->persist($event);
        $this->dispatcher->dispatch(CalendarEvents::POST_ADD, new CalendarEvent($event));
        $this->eventRepository->flush();

        return $event;
    }

    public function update(EventInterface $event)
    {
        $this->dispatcher->dispatch(CalendarEvents::POST_UPDATE, new CalendarEvent($event));
        $this->om->flush();
        return $event;
    }

    public function getMonthSheetDays(\DateTime $date)
    {
        $first_day = DatesTransformer::toMonday(DatesTransformer::toFirstMonthDay($date));
        $last_day = DatesTransformer::toSunday(DatesTransformer::toLastMonthDay($date));

        return DatesTransformer::getAllDaysBetween($first_day, $last_day);
    }

    public function getWeekSheetDays(\DateTime $date)
    {
        $first_day = DatesTransformer::toMonday($date);
        $last_day = DatesTransformer::toSunday($date);

        return DatesTransformer::getAllDaysBetween($first_day, $last_day);
    }
}
