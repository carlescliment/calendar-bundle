<?php

namespace BladeTester\CalendarBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class EventFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'bladetester_calendar.label.event.title',
            ))
            ->add('description', TextareaType::class, array(
                'required' => false,
                'label' => 'bladetester_calendar.label.event.description',
            ))
            ->add('start', DateTimeType::class, array(
                'label' => 'bladetester_calendar.label.event.start',
            ))
            ->add('end', DateTimeType::class, array(
                'label' => 'bladetester_calendar.label.event.end',
            ))
            ->add('category', CategoryType::class, array(
                'label' => 'bladetester_calendar.label.event.category',
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'event';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
        ));
    }
}
