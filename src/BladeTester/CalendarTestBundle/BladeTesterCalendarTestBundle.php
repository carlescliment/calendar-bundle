<?php

namespace BladeTester\CalendarTestBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BladeTesterCalendarTestBundle extends Bundle
{

   public function getParent()
    {
        return 'BladeTesterCalendarBundle';
    }
}
