CalendarBundle
==================

[![Build Status](https://travis-ci.org/carlescliment/calendar-bundle.png)](https://travis-ci.org/carlescliment/calendar-bundle)

The CalendarBundle gives you a built-in calendar for managing events without relying on third-parties like Google. It comes with four different default views; agenda, by day, by week and by month. If you need greater customizations, you can use the bundle as a simple calendar API and build your own logic on it.


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


### 3. Update your routing:
    // ...

    BladeTesterCalendarBundle:
        resource: "@BladeTesterCalendarBundle/Resources/config/routing.yml"
        prefix:   /



### 4. Create your calendar bundle

Create a new bundle extending BladeTesterCalendarBundle

    namespace Your\OwnCalendarBundle;

    use Symfony\Component\HttpKernel\Bundle\Bundle;

    class YourOwnCalendarBundle extends Bundle
    {

       public function getParent()
        {
            return 'BladeTesterCalendarBundle';
        }
    }

> WARNING: If your bundle includes its own routing file, remember to delete it or completely override the parent bundle paths.

Add it to AppKernel.
```
    $bundles = array(
        // ...
        new Your\OwnCalendarBundle\YourOwnCalendarBundle(),
    );
```

### 5. Map event class

Create an entity and inherit the base Event class. The only mandatory field you have to add is "id" to map your entity properly. Don't forget to update your database schema.

NOTE: At the moment it works only with Doctrine. Contribution to provide other drivers will be very appreciated.


    namespace Your\OwnCalendarBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use BladeTester\CalendarBundle\Entity\Event as BaseEvent;


    /**
     * @ORM\Entity(repositoryClass="BladeTester\CalendarBundle\Repository\EventRepository")
     * @ORM\Table(name="events")
     */
    class Event extends BaseEvent {

        /**
         * @ORM\Column(name="id", type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $id;


        public function getId() {
            return $this->id;
        }
    }




### 6. Modify your `app/config/config.yml`

    blade_tester_calendar:
        driver: doctrine/orm
        engine: twig
        classes:
            event:
                entity: Your\OwnBundle\Entity\Event
            category:
                entity: BladeTester\CalendarBundle\Entity\EventCategory


### 7. Update the schema

```
php app/console doctrine:schema:update --force
```

### 8. Install the assets

```
php app/console assets:install
```


## Using the calendar
Go to http://yourapp.com/calendar and enjoy :)



## Customizing the bundle
If you want to override the bundle default views to use your design and markup, please follow the next steps.

### 1. Override the default base template
Copy the template in `Resources/views/Base/base.html.twig` into your own bundle and modify it to extend your base template.

### 2. Add the assets to your base template
```
<script type="text/javascript" src="{{ asset('bundles/bladetestercalendar/js/jquery-1.9.1.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('bundles/bladetestercalendar/css/calendar.css') }}" />
<script type="text/javascript" src="{{ asset('bundles/bladetestercalendar/js/calendar.js') }}"></script>
```

Note: remove the line including jquery if your template already includes it.

## Extending the behaviour

It is easy to extend the behaviour of this bundle by using inheritance in your models and entities. If it is not enough, you can register listeners to the calendar events.

### Pre-persist event

Dispatched whenever an item is about to be created in the database.

```
    your_own_calendar_listener:
        class: Your\OwnCalendarBundle\Event\CalendarListener
        tags:
          - { name: kernel.event_listener, event: calendar.pre-persist, method: onPrePersist }
```

```php

namespace Your\OwnCalendarBundle\Event;

use BladeTester\CalendarBundle\Event\CalendarEvent;

class CalendarListener {

    public function onPrePersist(CalendarEvent $event) {
        $event_model = $event->getEvent();
        // do whatever with the object before persisting it.
    }
}

```


### Post-add event

Dispatched after an item is added to the database.

```
    your_own_calendar_listener:
        class: Your\OwnCalendarBundle\Event\CalendarListener
        tags:
          - { name: kernel.event_listener, event: calendar.post-add, method: onPostAdd }
```

### Post-update event

Dispatched after an item is updated.

```
    your_own_calendar_listener:
        class: Your\OwnCalendarBundle\Event\CalendarListener
        tags:
          - { name: kernel.event_listener, event: calendar.post-update, method: onPostUpdate }
```

## Testing
CalendarBundle contains unitary and functional tests. Download the bundle, create the database according to the `travis.yml` file and configure the access settings in `src/BladeTester/CalendarBundle/Tests/App/parameters.ini`. Run the following command:

```
cd /path/to/calendar-bundle
composer update
php vendor/bin/phpunit
```


## Credits

* Author: [Carles Climent][carlescliment] (programming)
* Author: [Marcos Calatayud][marcosc] (markup and design)
* Contributor: [Doug Hayward][BonnieDoug] (french translations, fixes)
* Contributor: [Rubén Egiguren][keopx] (basque translations)
* Contributor: [Andrzej Jarzebowski][8draco8] (polish translations)

## Contribute and feedback

Any feedback and contribution will be very appreciated.



[carlescliment]: https://github.com/carlescliment
[marcosc]: http://www.linkedin.com/profile/view?id=48458010
[BonnieDoug]: http://github.com/BonnieDoug
[keopx]: https://github.com/keopx
[8draco8]: https://github.com/8draco8
