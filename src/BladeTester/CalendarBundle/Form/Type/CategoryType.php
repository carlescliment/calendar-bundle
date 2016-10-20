<?php

namespace BladeTester\CalendarBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

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
        return ChoiceType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $categories = $this->manager->findAll();
        $choices = array();
        foreach ($categories as $category) {
            $choices[$category->getId()] = $category->getName();
        }
        $resolver->setDefaults(array(
            'required' => false,
            'choices' => $choices,
            'placeholder' => 'bladetester_calendar.label.event.category.none'
        ));
    }
}