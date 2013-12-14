<?php

namespace Benski\ReservationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Benski\ReservationBundle\Entity\Paiement;

class PaiementType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('reservation', 'entity', array(
                    'class' => 'BenskiReservationBundle:ReservationImpl'
                ))
                ->add('montant', 'money', array(
             'divisor' => 100,
             'label' => 'Montant'))
                ->add('code')
                ->add('mode', 'choice', array(
                    'choices' => array(
                        Paiement::$MODE_NON_DEFINI => 'non défini',
                        Paiement::$MODE_PAYPAL => 'Paypal',
                        Paiement::$MODE_VIREMENT => 'virement',
                        Paiement::$MODE_LIQUIDE => 'liquide',
                    )
                ))
                ->add('dateLimite')
                ->add('dateReception')
                ->add('dateNotificationReception')
                ->add('compteCrediteur')
                ->add('statut', 'choice', array(
                    'choices' => array(
                        Paiement::$STATUS_EN_ATTENTE => 'en attente',
                        Paiement::$STATUS_RECU => 'recu'
                    )
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Benski\ReservationBundle\Entity\Paiement'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'benski_reservationbundle_paiement';
    }

}
