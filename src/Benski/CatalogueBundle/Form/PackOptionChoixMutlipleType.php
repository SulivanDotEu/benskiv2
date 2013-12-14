<?php

namespace Benski\CatalogueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Benski\CatalogueBundle\Form\PrixOptionChoixMultipleType;

class PackOptionChoixMutlipleType extends AbstractType {

   /**
    * @param FormBuilderInterface $builder
    * @param array $options
    */
   public function buildForm(FormBuilderInterface $builder, array $options) {
      $builder->add('prixOption', 'collection', array(
                'type' => new PrixOptionChoixMultipleType(),
            ));
      
   }

   /**
    * @param OptionsResolverInterface $resolver
    */
   public function setDefaultOptions(OptionsResolverInterface $resolver) {
      $resolver->setDefaults(array(
          'data_class' => 'Benski\CatalogueBundle\Entity\PackOptionChoixMultiple'
      ));
   }

   /**
    * @return string
    */
   public function getName() {
      return 'benski_cataloguebundle_packoptionacocher';
   }

}
