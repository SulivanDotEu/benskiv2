<?php

namespace Benski\ReservationBundle\Form\Option;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OptionReserveType extends AbstractType {

   /**
    * @param FormBuilderInterface $builder
    * @param array $options
    */
   public function buildForm(FormBuilderInterface $builder, array $options) {
      $builder
              ->add('price', 'money', array(
                  'divisor' => 100,
              ))
      ;
   }

   /**
    * @param OptionsResolverInterface $resolver
    */
   public function setDefaultOptions(OptionsResolverInterface $resolver) {
      $resolver->setDefaults(array(
          'data_class' => 'Benski\ReservationBundle\Entity\Option\OptionReserve'
      ));
   }

   /**
    * @return string
    */
   public function getName() {
      return 'benski_reservationbundle_option_optionreserve';
   }

}
