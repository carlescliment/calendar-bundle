CalendarBundle
==================

This is a bundle that handles events in the calendar.


## Installation

### 1. Update your vendors

Add this line to your `composer.json`

    "require": {
        "carlescliment/calendar-bundle": "dev-master"
    }

Execute `php composer.phar update carlescliment/calendar-bundle`

### 2. Load the bundle in `app/AppKernel.php`
    $bundles = array(
        // ...
        new BladeTester\CalendarBundle\BladeTesterCalendarBundle(),
    );

### 3. Modify your `app/config/config.yml`

    blade_tester_calendar:
        driver: doctrine/orm
        engine: twig
        classes:
            event:
                entity: Your\OwnBundle\Entity\Event

#### 4. Update your routing:
    // ...

    BladeTesterCalendarBundle:
        resource: "@BladeTesterCalendarBundle/Resources/config/routing.yml"
        prefix:   /

## Credits

* Author: [Carles Climent][carlescliment]


## Contribute and feedback

Please, feel free to provide feedback of this bundle. Contributions will be much appreciated.



[carlescliment]: https://github.com/carlescliment
