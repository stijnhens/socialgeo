<?php

namespace Socialgeo\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('owner')
            ->add('district_id')
            ->add('title')
            ->add('body')
            ->add('created')
            ->add('approved')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Socialgeo\EventBundle\Entity\Events'
        ));
    }

    public function getName()
    {
        return 'socialgeo_eventbundle_eventstype';
    }
}
