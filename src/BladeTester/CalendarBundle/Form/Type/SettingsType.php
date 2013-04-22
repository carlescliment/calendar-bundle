<?php

namespace BladeTester\CalendarBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use BladeTester\CalendarBundle\Model\CalendarViews;

class SettingsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('defaultView', 'choice', array(
                'choices' => array(
                    CalendarViews::AGENDA => 'bladetester_calendar.label.agenda',
                    CalendarViews::DAY => 'bladetester_calendar.label.day',
                    CalendarViews::WEEK => 'bladetester_calendar.label.week',
                    CalendarViews::MONTH => 'bladetester_calendar.label.month',
                    ),
                'label' => 'bladetester_calendar.label.settings.default_view'));
    }


    public function getName()
    {
        return 'calendar_settings';
    }


}