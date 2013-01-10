<?php

namespace Socialgeo\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder->add('email', null, array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle',  'attr'=> array( 'placeholder'=>'form.email_placeholder')));

        $builder->add('plainPassword', 'repeated', array(
        'type' => 'password',
        'options' => array('translation_domain' => 'FOSUserBundle'),

            'first_options' => array('label' => 'form.password', 'attr'=> array( 'placeholder'=>'form.password_placeholder') ),
            'second_options' => array('label' => 'form.password_confirmation', 'attr'=> array( 'placeholder'=>'form.password_confirmation_placeholder') ),

         'invalid_message' => 'fos_user.password.mismatch',
        ));

        $builder->add('name', 'text', array('attr'=> array( 'placeholder'=>'Your name') ));

        $builder->add('lastname', 'text', array('attr'=> array( 'placeholder'=>'Your lastname') ));

        $builder->add('gender', 'choice', array(
            'choices'   => array('m' => 'Male', 'f' => 'Female'),
            'required'  => false,
        ));


        $builder->add('birthday', 'date', array(
            'input'  => 'datetime',
            'widget' => 'single_text',

        ));

        $builder->add('nationality', 'text', array('attr'=> array( 'placeholder'=>'Your nationality') ));

        $builder->add('street', 'text', array('attr'=> array( 'placeholder'=>'Your street + nr') ));

        $builder->add('postalcode', 'text', array('attr'=> array( 'placeholder'=>'Your postalcode') ));

        $builder->add('city', 'text', array('attr'=> array( 'placeholder'=>'Your city') ));



    }

    public function getName()
    {
        return 'socialgeo_user_registration';
    }
}