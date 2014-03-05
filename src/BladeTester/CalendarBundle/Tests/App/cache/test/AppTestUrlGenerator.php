<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * AppTestUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class AppTestUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        'calendar_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/calendar',    ),  ),  4 =>   array (  ),),
        'calendar_event_list' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::listAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/calendar/list',    ),  ),  4 =>   array (  ),),
        'calendar_event_list_by_day' => array (  0 =>   array (    0 => 'year',    1 => 'month',    2 => 'day',  ),  1 =>   array (    '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::listByDayAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'day',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'month',    ),    2 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'year',    ),    3 =>     array (      0 => 'text',      1 => '/calendar/by_day',    ),  ),  4 =>   array (  ),),
        'calendar_event_list_by_week' => array (  0 =>   array (    0 => 'year',    1 => 'month',    2 => 'day',  ),  1 =>   array (    '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::listByWeekAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'day',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'month',    ),    2 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'year',    ),    3 =>     array (      0 => 'text',      1 => '/calendar/by_week',    ),  ),  4 =>   array (  ),),
        'calendar_event_list_by_month' => array (  0 =>   array (    0 => 'year',    1 => 'month',  ),  1 =>   array (    '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::listByMonthAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'month',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'year',    ),    2 =>     array (      0 => 'text',      1 => '/calendar/by_month',    ),  ),  4 =>   array (  ),),
        'calendar_event_add' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::addAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/calendar/add',    ),  ),  4 =>   array (  ),),
        'calendar_event_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/calendar',    ),  ),  4 =>   array (  ),),
        'calendar_event_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'BladeTester\\CalendarBundle\\Controller\\EventController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/calendar',    ),  ),  4 =>   array (  ),),
        'calendar_mini_calendar' => array (  0 =>   array (    0 => 'year',    1 => 'month',  ),  1 =>   array (    '_controller' => 'BladeTester\\CalendarBundle\\Controller\\CalendarController::showMiniAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'month',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'year',    ),    2 =>     array (      0 => 'text',      1 => '/calendar/mini',    ),  ),  4 =>   array (  ),),
        'calendar_category_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'BladeTester\\CalendarBundle\\Controller\\CategoryController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/calendar/category',    ),  ),  4 =>   array (  ),),
        'calendar_category_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'BladeTester\\CalendarBundle\\Controller\\CategoryController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/calendar/category',    ),  ),  4 =>   array (  ),),
        'calendar_category_add' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'BladeTester\\CalendarBundle\\Controller\\CategoryController::addAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/calendar/category/add',    ),  ),  4 =>   array (  ),),
        'calendar_settings_update' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'BladeTester\\CalendarBundle\\Controller\\SettingsController::updateAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/calendar/settings/update',    ),  ),  4 =>   array (  ),),
        'calendar_settings' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'BladeTester\\CalendarBundle\\Controller\\SettingsController::indexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/calendar/settings',    ),  ),  4 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens);
    }
}
