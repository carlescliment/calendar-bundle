<?php

namespace BladeTester\CalendarBundle\Model;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use BladeTester\CalendarBundle\Event\CalendarEvent,
    BladeTester\CalendarBundle\Event\CalendarEvents;
use BladeTester\CalendarBundle\Factory\EventFactoryInterface;
use BladeTester\CalendarBundle\Repository\SettingRepositoryInterface;

class Calendar implements CalendarInterface
{
    private $dispatcher;
    private $eventFactory;
    private $eventRepository;
    private $settingRepository;

    public function __construct(
        EventDispatcherInterface $dispatcher,
        EventFactoryInterface $event_factory,
        EventRepositoryInterface $event_repository,
        SettingRepositoryInterface $setting_repository
    )
    {
        $this->dispatcher = $dispatcher;
        $this->eventFactory = $event_factory;
        $this->eventRepository = $event_repository;
        $this->settingRepository = $setting_repository;
    }

    public function __call($method_name, $arguments)
    {
        return call_user_func_array(array(&$this->eventRepository, $method_name), $arguments);
    }

    public function getSettings()
    {
        return $this->settingRepository->getSettings();
    }

    public function updateSettings(Settings $settings)
    {
        return $this->settingRepository->updateSettings($settings);
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

        return $event;
    }

    public function update(EventInterface $event)
    {
        $this->dispatcher->dispatch(CalendarEvents::POST_UPDATE, new CalendarEvent($event));

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
