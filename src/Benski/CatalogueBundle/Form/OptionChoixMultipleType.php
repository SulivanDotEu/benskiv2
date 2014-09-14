<?php

namespace Benski\CatalogueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Benski\CatalogueBundle\Form\Option\ChoixOptionMultipleType;
use Benski\CatalogueBundle\Form\Option\AbstractOptionType;

class OptionChoixMultipleType extends AbstractType {

   /**
    * @param FormBuilderInterface $builder
    * @param array $options
    */
   public function buildForm(FormBuilderInterface $builder, array $options) {
      $parentType = new AbstractOptionType();
      $parentType->buildForm($builder, $options);
      $builder->add('choix', 'collection', array(
          'type' => new ChoixOptionMultipleType(),
          'allow_add' => true,
          'allow_delete' => true,
          'by_reference' => false,
      ));
   }

   /**
    * @param OptionsResolverInterface $resolver
    */
   public function setDefaultOptions(OptionsResolverInterface $resolver) {
      $resolver->setDefaults(array(
          'data_class' => 'Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple'
      ));
   }

   /**
    * @return string
    */
   public function getName() {
      return 'benski_cataloguebundle_optionchoixmultiple';
   }

}
