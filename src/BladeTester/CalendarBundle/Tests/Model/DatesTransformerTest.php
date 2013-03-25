<?php

namespace BladeTester\CalendarBundle\Tests\Model;

use BladeTester\CalendarBundle\Model\DatesTransformer;

class DatesTransformerTest extends \PHPUnit_Framework_TestCase {

    /**
     * @test
     */
    public function itBringsMondayOnSunday() {
        // Arrange
        $reference_date = '2013-03-17';

        // Act
        $monday = DatesTransformer::toMonday(new \DateTime($reference_date));

        // Expect
        $this->assertEquals('2013-03-11', $monday->format('Y-m-d'));
    }

    /**
     * @test
     */
    public function itBringsMondayOnMonday() {
        // Arrange
        $reference_date = '2013-03-11';

        // Act
        $monday = DatesTransformer::toMonday(new \DateTime($reference_date));

        // Expect
        $this->assertEquals('2013-03-11', $monday->format('Y-m-d'));
    }

    /**
     * @test
     */
    public function itBringsMondayOnMiddleDay() {
        // Arrange
        $reference_date = '2013-03-15';

        // Act
        $monday = DatesTransformer::toMonday(new \DateTime($reference_date));

        // Expect
        $this->assertEquals('2013-03-11', $monday->format('Y-m-d'));
    }

    /**
     * @test
     */
    public function itBringsSundayOnSunday() {
        // Arrange
        $reference_date = '2013-03-17';

        // Act
        $sunday = DatesTransformer::toSunday(new \DateTime($reference_date));

        // Expect
        $this->assertEquals('2013-03-17', $sunday->format('Y-m-d'));
    }

    /**
     * @test
     */
    public function itBringsSundayOnMonday() {
        // Arrange
        $reference_date = '2013-03-11';

        // Act
        $sunday = DatesTransformer::toSunday(new \DateTime($reference_date));

        // Expect
        $this->assertEquals('2013-03-17', $sunday->format('Y-m-d'));
    }

    /**
     * @test
     */
    public function itBringsSundayOnMiddleDay() {
        // Arrange
        $reference_date = '2013-03-11';

        // Act
        $sunday = DatesTransformer::toSunday(new \DateTime($reference_date));

        // Expect
        $this->assertEquals('2013-03-17', $sunday->format('Y-m-d'));
    }

    /**
     * @test
     */
    public function itBringsTheFirstMonthDayFromTheFirstMonthDay() {
        // Arrange
        $reference_date = '2013-03-01';

        // Act
        $first_month_day = DatesTransformer::toFirstMonthDay(new \DateTime($reference_date));

        // Expect
        $this->assertEquals('2013-03-01', $first_month_day->format('Y-m-d'));
    }

    /**
     * @test
     */
    public function itBringsTheFirstMonthDayFromTheLastMonthDay() {
        // Arrange
        $reference_date = '2013-03-31';

        // Act
        $first_month_day = DatesTransformer::toFirstMonthDay(new \DateTime($reference_date));

        // Expect
        $this->assertEquals('2013-03-01', $first_month_day->format('Y-m-d'));
    }

    /**
     * @test
     */
    public function itBringsTheFirstMonthDayFromAMiddleDay() {
        // Arrange
        $reference_date = '2013-03-15';

        // Act
        $first_month_day = DatesTransformer::toFirstMonthDay(new \DateTime($reference_date));

        // Expect
        $this->assertEquals('2013-03-01', $first_month_day->format('Y-m-d'));
    }

    /**
     * @test
     */
    public function itBringsTheLastMonthDayFromTheFirstMonthDay() {
        // Arrange
        $reference_date = '2013-03-01 00:00:00';

        // Act
        $last_month_day = DatesTransformer::toLastMonthDay(new \DateTime($reference_date));

        // Expect
        $this->assertEquals('2013-03-31', $last_month_day->format('Y-m-d'));
    }

    /**
     * @test
     */
    public function itBringsTheLastMonthDayFromTheLastMonthDay() {
        // Arrange
        $reference_date = '2013-03-31';

        // Act
        $last_month_day = DatesTransformer::toLastMonthDay(new \DateTime($reference_date));

        // Expect
        $this->assertEquals('2013-03-31', $last_month_day->format('Y-m-d'));
    }

    /**
     * @test
     */
    public function itBringsTheLastMonthDayFromAMiddleDay() {
        // Arrange
        $reference_date = '2013-03-15';

        // Act
        $last_month_day = DatesTransformer::toLastMonthDay(new \DateTime($reference_date));

        // Expect
        $this->assertEquals('2013-03-31', $last_month_day->format('Y-m-d'));
    }

    /**
     * @test
     * @expectedException BladeTester\CalendarBundle\Exception\InvalidDateRangeException
     */
    public function itThrowsAnExceptionGettingIntervalFromInvalidDates() {
        // Arrange
        $start_date = new \DateTime('2013-03-15');
        $end_date = new \DateTime('2013-03-11');

        // Act
        DatesTransformer::getAllDaysBetween($start_date, $end_date);
    }

    /**
     * @test
     */
    public function itBringsASingleDayGettingIntervalFromEqualDays() {
        // Arrange
        $start_date = new \DateTime('2013-03-15');
        $end_date = new \DateTime('2013-03-15');

        // Act
        $days = DatesTransformer::getAllDaysBetween($start_date, $end_date);

        // Assert
        $this->assertCount(1, $days);
    }


    /**
     * @test
     */
    public function itBringsAllDaysInAnIntervalIncludingBothThresholds() {
        // Arrange
        $start_date = new \DateTime('2013-03-15');
        $end_date = new \DateTime('2013-03-25');

        // Act
        $days = DatesTransformer::getAllDaysBetween($start_date, $end_date);

        // Assert
        $this->assertCount(11, $days);
    }


    /**
     * @test
     */
    public function itBringsTheNextMonthFromANormalDay() {
        // Arrange
        $reference_date = new \DateTime('2013-03-15');

        // Act
        $next_month = DatesTransformer::nextMonth($reference_date);

        // Assert
        $this->assertEquals('2013-04', $next_month->format('Y-m'));
    }


    /**
     * @test
     */
    public function itBringsTheNextMonthFromTheLastDay() {
        // Arrange
        $reference_date = new \DateTime('2013-03-31');

        // Act
        $next_month = DatesTransformer::nextMonth($reference_date);

        // Assert
        $this->assertEquals('2013-04', $next_month->format('Y-m'));
    }

    /**
     * @test
     */
    public function itBringsTheNextMonthFromAFebruaryInALeapYear() {
        // Arrange
        $reference_date = new \DateTime('2016-02-29');

        // Act
        $next_month = DatesTransformer::nextMonth($reference_date);

        // Assert
        $this->assertEquals('2016-03', $next_month->format('Y-m'));
    }


    /**
     * @test
     */
    public function itBringsThePreviousMonthFromANormalDay() {
        // Arrange
        $reference_date = new \DateTime('2013-03-15');

        // Act
        $previous_month = DatesTransformer::previousMonth($reference_date);

        // Assert
        $this->assertEquals('2013-02', $previous_month->format('Y-m'));
    }


    /**
     * @test
     */
    public function itBringsThePreviousMonthFromTheFirstDay() {
        // Arrange
        $reference_date = new \DateTime('2013-03-01');

        // Act
        $previous_month = DatesTransformer::previousMonth($reference_date);

        // Assert
        $this->assertEquals('2013-02', $previous_month->format('Y-m'));
    }


    /**
     * @test
     */
    public function itBringsThePreviousMonthFromDay31() {
        // Arrange
        $reference_date = new \DateTime('2013-04-30');

        // Act
        $previous_month = DatesTransformer::previousMonth($reference_date);

        // Assert
        $this->assertEquals('2013-03', $previous_month->format('Y-m'));
    }

    /**
     * @test
     */
    public function itBringsThePreviousMonthFromMarchTheLast() {
        // Arrange
        $reference_date = new \DateTime('2013-03-31');

        // Act
        $previous_month = DatesTransformer::previousMonth($reference_date);

        // Assert
        $this->assertEquals('2013-02', $previous_month->format('Y-m'));
    }


    /**
     * @test
     */
    public function itBringsTheNextWeekDay() {
        // Arrange
        $reference_date = new \DateTime('2013-03-31');

        // Act
        $next_week = DatesTransformer::nextWeek($reference_date);

        // Assert
        $this->assertEquals('2013-04-07', $next_week->format('Y-m-d'));
    }


    /**
     * @test
     */
    public function itBringsThePreviousWeekDay() {
        // Arrange
        $reference_date = new \DateTime('2013-04-07');

        // Act
        $previous_week = DatesTransformer::previousWeek($reference_date);

        // Assert
        $this->assertEquals('2013-03-31', $previous_week->format('Y-m-d'));
    }


    /**
     * @test
     */
    public function itBringsTheNextDay() {
        // Arrange
        $reference_date = new \DateTime('2013-04-30');

        // Act
        $next_day = DatesTransformer::nextDay($reference_date);

        // Assert
        $this->assertEquals('2013-05-01', $next_day->format('Y-m-d'));
    }

    /**
     * @test
     */
    public function itBringsThePreviousDay() {
        // Arrange
        $reference_date = new \DateTime('2013-05-01');

        // Act
        $previous_day = DatesTransformer::previousDay($reference_date);

        // Assert
        $this->assertEquals('2013-04-30', $previous_day->format('Y-m-d'));
    }

}