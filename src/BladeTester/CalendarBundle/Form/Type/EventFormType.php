<?php

namespace BladeTester\CalendarBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventFormType extends AbstractType {

    protected $dataClass;

    public function __construct($dataClass)
    {
        $this->dataClass = $dataClass;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text')
            ->add('description', 'textarea', array(
                'required' => false,
            ))
            ->add('start', 'datetime')
            ->add('end', 'datetime')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'event';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->dataClass
        ));
    }
}