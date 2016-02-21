<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, array(
                'label'    => 'form.label_firstname',
                'required' => true
            ))
            ->add('lastname', null, array(
                'label'    => 'form.label_lastname',
                'required' => true
            ))
            ->add('biography', 'textarea', array(
                'label'    => 'form.label_biography',
                'required' => true
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
            'intention'  => 'profile',
            'label' => 'Edit Profile'
        ));
    }

    public function getName()
    {
        return 'mava_user_profile';
    }
}