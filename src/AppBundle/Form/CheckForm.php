<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CheckForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cardNumber')
            ->add('date', 'date', array(
                'input'  => 'datetime',
                'widget' => 'choice',
                'placeholder' => array('year' => 'Year', 'month' => 'Month', 'day' => 'Day'),
                'years' => range(2017,2025),
            ))
            ->add('cvv2')
            ->add('email')
            ->add('phone')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Payment',
        ));
    }

    public function getName()
    {
        return 'CheckForm';
    }
}