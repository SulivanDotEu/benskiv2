<?php

namespace Benski\ReservationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AppartementReserveType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('optionsReserves', 'collection', array(
                'type' => new Option\OptionReserveType(),
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Benski\ReservationBundle\Entity\AppartementReserve'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'benski_reservationbundle_appartementreserve';
    }
}
