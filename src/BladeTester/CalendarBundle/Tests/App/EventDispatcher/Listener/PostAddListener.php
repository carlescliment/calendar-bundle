<?php

namespace BladeTester\CalendarBundle\Tests\App\EventDispatcher\Listener;

class PostAddListener
{
    private $called = false;

    public function onEventPostAdd()
    {
        $this->called = true;
    }

    public function hasBeenCalled()
    {
        return $this->called;
    }
}
