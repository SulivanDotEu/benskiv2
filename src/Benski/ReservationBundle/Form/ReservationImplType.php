<?php

namespace Benski\ReservationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReservationImplType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('responsable', 'entity', array(
                    'class' => 'BenskiUserBundle:User'
                ))
                ->add('total')
                ->add('statut')
                ->add('dateCreation')
                ->add('dateModification')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Benski\ReservationBundle\Entity\ReservationImpl'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'benski_reservationbundle_reservationimpl';
    }

}
