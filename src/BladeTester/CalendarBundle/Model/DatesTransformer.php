<?php

namespace BladeTester\CalendarBundle\Model;

class DatesTransformer {

    public static function toMonday(\DateTime $date) {
        $givenday = self::getWeekDay($date);
        if ($givenday == 1) {
            return $date;
        }
        $days_to_remove = $givenday - 1;
        $new_date = clone($date);
        return $new_date->sub(date_interval_create_from_date_string("$days_to_remove days"));
    }

    public static function toSunday(\DateTime $date) {
        $givenday = self::getWeekDay($date);
        if ($givenday == 0) {
            return $date;
        }
        $days_to_add = 7 - $givenday;
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
        $dates = array();
        $current = $start;
        while ($current <= $end) {
            $dates[] = clone($current);
            $current->add(date_interval_create_from_date_string('1 day'));
        }
        return $dates;
    }

    public static function nextMonth(\DateTime $date) {
        if (self::isFebruaryVulnerable($date)) {
            return new \DateTime($date->format('Y-02-28'));
        }
        $next_month_date = new \DateTime($date->format('Y-m-d'));
        $interval = \DateInterval::createFromDateString('1 month');
        return $next_month_date->add($interval);
    }

    public static function previousMonth(\DateTime $date) {
        $previous_month_date = new \DateTime($date->format('Y-m-d'));
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


    private static function isFebruaryVulnerable(\DateTime $date) {
        return $date >= new \DateTime($date->format('Y-01-29 00:00')) &&
               $date <= new \DateTime($date->format('Y-01-31 23:59'));
    }
}