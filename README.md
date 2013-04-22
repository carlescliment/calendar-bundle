CalendarBundle
==================

This is a bundle that handles events in the calendar. It provides four different default views; agenda, by day, by week and by month. You can also use this bundle as a simple calendar API.


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

WARNING: If your bundle includes its own routing file, remember to delete it or completely override the parent bundle paths.

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


## Using the calendar
Go to http://yourapp.com/calendar and enjoy :)



## Customizing the bundle
If you want to override the bundle default views to use your design and markup, please follow the next steps.

### 1. Override the default base template
Copy the template in `Resources/views/Base/base.html.twig` into your own bundle and modify it to extend your base template.

### 2. Add the assets to your base template
    <script type="text/javascript" src="{{ asset('bundles/bladetestercalendar/js/jquery-1.9.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('bundles/bladetestercalendar/css/calendar.css') }}" />
    <script type="text/javascript" src="{{ asset('bundles/bladetestercalendar/js/calendar.js') }}"></script>

Note: remove the line including jquery if your template already includes it.



## Testing
CalendarBundle has been developed using the TDD technique, so it contains unitary and functional tests. If you want to check your installation, run the tests once you have properly configured it.

    app/console doctrine:schema:update -e test --force
    phpunit -c app/ vendor/carlescliment/calendar-bundle/src/BladeTester/CalendarBundle/Tests/

## Credits

* Author: [Carles Climent][carlescliment] (programming)
* Author: [Marcos Calatayud][marcosc] (markup and design)


## Contribute and feedback

Please, feel free to provide feedback of this bundle. Contributions will be much appreciated.



[carlescliment]: https://github.com/carlescliment
[marcosc]: http://www.linkedin.com/profile/view?id=48458010
