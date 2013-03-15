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


#### 3. Update your routing:
    // ...

    BladeTesterCalendarBundle:
        resource: "@BladeTesterCalendarBundle/Resources/config/routing.yml"
        prefix:   /

#### 4. Add the assets to your base template
     <link rel="stylesheet" href="{{ asset('bundles/bladetestercalendar/css/calendar.css') }}" />
     <script type="text/javascript" src="{{ asset('bundles/bladetestercalendar/js/calendar.js') }}"></script>

## Overriding the bundle


### 1. Create your calendar bundle

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


### 2. Map an Event class

Create an entity and inherit the base Event class. The only mandatory field you have to add is "id" to map your entity properly.

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

### 3. Modify your `app/config/config.yml`

    blade_tester_calendar:
        driver: doctrine/orm
        engine: twig
        classes:
            event:
                entity: Your\OwnBundle\Entity\Event

### 4. Override the default base template
Copy the template in `Resources/views/Event/base.html.twig` into your own bundle and modify it to extend your base template.


## Using the calendar
Go to http://yourapp.com/calendar and enjoy :)


## Credits

* Author: [Carles Climent][carlescliment]
* Author: [Marcos Calatayud][marcosc]


## Contribute and feedback

Please, feel free to provide feedback of this bundle. Contributions will be much appreciated.



[carlescliment]: https://github.com/carlescliment
[marcosc]: http://www.linkedin.com/profile/view?id=48458010
