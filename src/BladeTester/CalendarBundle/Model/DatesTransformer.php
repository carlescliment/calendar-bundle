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
}