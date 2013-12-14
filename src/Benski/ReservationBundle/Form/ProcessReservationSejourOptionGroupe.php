<?php

namespace Benski\ReservationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProcessReservationSejourOptionGroupe extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('appartementsReserves', 'collection', array(
                'type' => new AppartementReserveType()
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Benski\ReservationBundle\Entity\SejourReserve'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'benski_reservationbundle_process_reservation_sejour_option_groupe';
    }
}
