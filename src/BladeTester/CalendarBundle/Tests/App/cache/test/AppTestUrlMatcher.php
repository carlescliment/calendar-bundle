<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * AppTestUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class AppTestUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/calendar')) {
            // calendar_index
            if ($pathinfo === '/calendar') {
                return array (  '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::indexAction',  '_route' => 'calendar_index',);
            }

            // calendar_event_list
            if ($pathinfo === '/calendar/list') {
                return array (  '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::listAction',  '_route' => 'calendar_event_list',);
            }

            if (0 === strpos($pathinfo, '/calendar/by_')) {
                // calendar_event_list_by_day
                if (0 === strpos($pathinfo, '/calendar/by_day') && preg_match('#^/calendar/by_day/(?P<year>[^/]++)/(?P<month>[^/]++)/(?P<day>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'calendar_event_list_by_day')), array (  '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::listByDayAction',));
                }

                // calendar_event_list_by_week
                if (0 === strpos($pathinfo, '/calendar/by_week') && preg_match('#^/calendar/by_week/(?P<year>[^/]++)/(?P<month>[^/]++)/(?P<day>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'calendar_event_list_by_week')), array (  '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::listByWeekAction',));
                }

                // calendar_event_list_by_month
                if (0 === strpos($pathinfo, '/calendar/by_month') && preg_match('#^/calendar/by_month/(?P<year>[^/]++)/(?P<month>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'calendar_event_list_by_month')), array (  '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::listByMonthAction',));
                }

            }

            // calendar_event_add
            if ($pathinfo === '/calendar/add') {
                return array (  '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::addAction',  '_route' => 'calendar_event_add',);
            }

            // calendar_event_edit
            if (preg_match('#^/calendar/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'calendar_event_edit')), array (  '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::editAction',));
            }

            // calendar_event_delete
            if (preg_match('#^/calendar/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'calendar_event_delete')), array (  '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::deleteAction',));
            }

            // calendar_mini_calendar
            if (0 === strpos($pathinfo, '/calendar/mini') && preg_match('#^/calendar/mini/(?P<year>[^/]++)/(?P<month>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'calendar_mini_calendar')), array (  '_controller' => 'BladeTester\\CalendarBundle\\Controller\\CalendarController::showMiniAction',));
            }

            if (0 === strpos($pathinfo, '/calendar/category')) {
                // calendar_category_edit
                if (preg_match('#^/calendar/category/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'calendar_category_edit')), array (  '_controller' => 'BladeTester\\CalendarBundle\\Controller\\CategoryController::editAction',));
                }

                // calendar_category_delete
                if (preg_match('#^/calendar/category/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'calendar_category_delete')), array (  '_controller' => 'BladeTester\\CalendarBundle\\Controller\\CategoryController::deleteAction',));
                }

                // calendar_category_add
                if ($pathinfo === '/calendar/category/add') {
                    return array (  '_controller' => 'BladeTester\\CalendarBundle\\Controller\\CategoryController::addAction',  '_route' => 'calendar_category_add',);
                }

            }

            if (0 === strpos($pathinfo, '/calendar/settings')) {
                // calendar_settings_update
                if ($pathinfo === '/calendar/settings/update') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_calendar_settings_update;
                    }

                    return array (  '_controller' => 'BladeTester\\CalendarBundle\\Controller\\SettingsController::updateAction',  '_route' => 'calendar_settings_update',);
                }
                not_calendar_settings_update:

                // calendar_settings
                if ($pathinfo === '/calendar/settings') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_calendar_settings;
                    }

                    return array (  '_controller' => 'BladeTester\\CalendarBundle\\Controller\\SettingsController::indexAction',  '_route' => 'calendar_settings',);
                }
                not_calendar_settings:

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
