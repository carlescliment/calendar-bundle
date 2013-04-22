<?php

namespace BladeTester\CalendarBundle\Model;

use BladeTester\CalendarBundle\Exception\InvalidDateRangeException;

class DatesTransformer {

    const MONDAY = 1;
    const SUNDAY = 0;
    const LATIN_SUNDAY = 7;
    const MARCH = 3;

    public static function toMonday(\DateTime $date) {
        $givenday = self::getWeekDay($date);
        if ($givenday == self::MONDAY) {
            return $date;
        }
        if ($givenday == self::SUNDAY) {
            $givenday = self::LATIN_SUNDAY;
        }
        $days_to_remove = $givenday - 1;
        $new_date = clone($date);
        return $new_date->sub(date_interval_create_from_date_string("$days_to_remove days"));
    }

    public static function toSunday(\DateTime $date) {
        $givenday = self::getWeekDay($date);
        if ($givenday == self::SUNDAY) {
            return $date;
        }
        $days_to_add = self::LATIN_SUNDAY - $givenday;
        $new_date = clone($date);
        return $new_date->add(date_interval_create_from_date_string("$days_to_add days"));
    }

    private static function getWeekDay(\DateTime $date) {
        return date("w", mktime(0, 0, 0, $date->format('m'), $date->format('d'), $date->format('Y')));
    }


    public static function toFirstMonthDay(\DateTime $date) {
        return new \DateTime($date->format('Y') . '-' . $date->format('m') . '-01');
    }

    public static function toLastMonthDay(\DateTime $date) {
        $first_day = self::toFirstMonthDay($date);
        $next_month_day = $first_day->add(date_interval_create_from_date_string("1 month"));
        return $next_month_day->sub(date_interval_create_from_date_string("1 day"));
    }

    public static function getAllDaysBetween(\DateTime $start, \DateTime $end) {
        self::assertValidRange($start, $end);
        $dates = array();
        $current = clone($start);
        while ($current <= $end) {
            $dates[] = clone($current);
            $current->add(date_interval_create_from_date_string('1 day'));
        }
        return $dates;
    }

    private static function assertValidRange(\DateTime $start, \DateTime $end) {
        if ($start->format('Y-m-d') > $end->format('Y-m-d')) {
            throw new InvalidDateRangeException('Invalid range from ' . $start->format('Y-m-d') . ' to ' . $end->format('Y-m-d'));
        }
    }

    public static function nextMonth(\DateTime $date) {
        if (self::wouldJumpFebruary($date)) {
            return new \DateTime($date->format('Y-02-28'));
        }
        if (self::isLastMonthDay($date)) {
            return self::nextDay($date);
        }
        $next_month_date = new \DateTime($date->format('Y-m-d'));
        $interval = \DateInterval::createFromDateString('1 month');
        return $next_month_date->add($interval);
    }

    private static function wouldJumpFebruary(\DateTime $date) {
        return $date >= new \DateTime($date->format('Y-01-29 00:00')) &&
               $date <= new \DateTime($date->format('Y-01-31 23:59'));
    }

    private static function isLastMonthDay(\DateTime $date) {
        $last_month_date = self::toLastMonthDay($date);
        return $date->format('Y-m-d') == $last_month_date->format('Y-m-d');
    }

    public static function previousMonth(\DateTime $date) {
        $previous_month_date = new \DateTime($date->format('Y-m-d'));
        if ($previous_month_date->format('m') == self::MARCH) {
            return new \DateTime($previous_month_date->format('Y-02-01'));
        }
        if ($previous_month_date->format('d') == 31) {
            $previous_month_date = new \DateTime($previous_month_date->format('Y-m-30'));
        }
        $interval = \DateInterval::createFromDateString('1 month');
        return $previous_month_date->sub($interval);
    }

    public static function nextWeek(\DateTime $date) {
        $next_week_date = new \DateTime($date->format('Y-m-d'));
        $interval = \DateInterval::createFromDateString('7 days');
        return $next_week_date->add($interval);
    }

    public static function previousWeek(\DateTime $date) {
        $previous_week_date = new \DateTime($date->format('Y-m-d'));
        $interval = \DateInterval::createFromDateString('7 days');
        return $previous_week_date->sub($interval);
    }

    public static function nextDay(\DateTime $date) {
        $next_day_date = new \DateTime($date->format('Y-m-d'));
        $interval = \DateInterval::createFromDateString('1 day');
        return $next_day_date->add($interval);
    }

    public static function previousDay(\DateTime $date) {
        $previous_day_date = new \DateTime($date->format('Y-m-d'));
        $interval = \DateInterval::createFromDateString('1 day');
        return $previous_day_date->sub($interval);
    }
}
