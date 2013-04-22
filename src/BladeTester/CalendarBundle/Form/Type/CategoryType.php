<?php

namespace BladeTester\CalendarBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use BladeTester\CalendarBundle\Model\EventCategoryManager;
use Symfony\Component\Form\DataTransformerInterface;

class CategoryType extends AbstractType {

    protected $manager;
    protected $transformer;

    public function __construct(EventCategoryManager $manager, DataTransformerInterface $transformer)
    {
        $this->manager = $manager;
        $this->transformer = $transformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addModelTransformer($this->transformer);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'calendar_event_category_type';
    }

    public function getParent() {
        return 'choice';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $categories = $this->manager->findAll();
        $choices = array();
        foreach ($categories as $category) {
            $choices[$category->getId()] = $category->getName();
        }
        $resolver->setDefaults(array(
            'required' => false,
            'choices' => $choices,
            'empty_value' => 'bladetester_calendar.label.event.category.none'
        ));
    }
}