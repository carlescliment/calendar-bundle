<?php

namespace BladeTester\CalendarBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use BladeTester\CalendarBundle\Model\Color;

class EventCategoryFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'bladetester_calendar.label.category.name',
            ))
            ->add('color', ChoiceType::class, array(
                'label' => 'bladetester_calendar.label.category.color',
                'choices' => array(
                    Color::BLACK => 'Black',
                    Color::RED => 'Red',
                    Color::GREEN => 'Green',
                    Color::BLUE => 'Blue',
                    Color::YELLOW => 'Yellow',
                    Color::CYAN => 'Cyan',
                    Color::MAGENTA => 'Magenta',
                    Color::GRAY => 'Gray',
                    Color::WHITE => 'White',
                    ),
                )
            );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'category';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
        ));
    }
}
