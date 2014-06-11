<?php

namespace BladeTester\CalendarBundle\Tests\Model;

use BladeTester\CalendarBundle\Model\Event,
    BladeTester\CalendarBundle\Validator\Constraints\ContainsValidDatesValidator;


class ContainsValidDatesValidatorTest extends \PHPUnit_Framework_TestCase {

    private $event;
    private $context;

    public function setUp() {
        $this->event = new Event;
        $this->context = $this->getMock('Symfony\Component\Validator\ExecutionContextInterface');
    }

    /**
     * @test
     */
    public function itIsNotValidIfEndDateIsLowerThanStartDate() {
        // Arrange
        $this->event->setStart(new \DateTime('2010-10-10 10:00'));
        $this->event->setEnd(new \DateTime('2010-10-10 09:50'));

        // Expect
        $this->context->expects($this->once())
            ->method('addViolationAt');

        // Act
        $is_valid = $this->event->isValid($this->context);


    }

    /**
     * @test
     */
    public function itIsValidIfEndDateIsGreaterOrEqualToStartDate() {
        // Arrange
        $this->event->setStart(new \DateTime('2010-10-10 09:50'));
        $this->event->setEnd(new \DateTime('2010-10-10 10:00'));

        // Expect
        $this->context->expects($this->never())
            ->method('addViolationAt');

        // Act
        $is_valid = $this->event->isValid($this->context);
    }

}