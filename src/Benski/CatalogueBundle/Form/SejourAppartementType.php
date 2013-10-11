<?php

namespace Benski\CatalogueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SejourAppartementType extends AbstractType {

   private $sejourAppartement;

   function __construct($sejourAppartement) {
      $this->sejourAppartement = $sejourAppartement;
   }

   /**
    * @param FormBuilderInterface $builder
    * @param array $options
    */
   public function buildForm(FormBuilderInterface $builder, array $options) {
      $builder
              ->add('appartement')
              ->add('sejour')
              ->add('stock')
      ;
      for ($i = 1; $i <= $this->sejourAppartement->getAppartement()->getNombreLits(); $i++) {
         $builder->add('Prix pour '.$i, 'money', array(
             'divisor' => 100,
         ));
      }
      
   }

   /**
    * @param OptionsResolverInterface $resolver
    */
   public function setDefaultOptions(OptionsResolverInterface $resolver) {
      $resolver->setDefaults(array(
          'data_class' => 'Benski\CatalogueBundle\Entity\SejourAppartement'
      ));
   }

   /**
    * @return string
    */
   public function getName() {
      return 'benski_cataloguebundle_sejourappartement';
   }

}
