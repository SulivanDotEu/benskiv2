<?php

namespace Benski\CatalogueBundle\Form\Option;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Benski\CatalogueBundle\Entity\Option\AbstractOption;

class AbstractOptionType extends AbstractType {

   /**
    * @param FormBuilderInterface $builder
    * @param array $options
    */
   public function buildForm(FormBuilderInterface $builder, array $options) {
      $builder
              ->add('nom')
              ->add('adminId')
              ->add('description')
              ->add('type', 'choice', array(
                  'choices' => array(
                      AbstractOption::$TYPE_GROUPE => 'Groupe',
                      AbstractOption::$TYPE_INDIVIDUEL => 'Individuel',
                  ),
                  'multiple' => false,
                  'expanded' => true,
              ))
              ->add('explication')
              ->add('published')
      ;
   }

   /**
    * @param OptionsResolverInterface $resolver
    */
   public function setDefaultOptions(OptionsResolverInterface $resolver) {
      $resolver->setDefaults(array(
          'data_class' => 'Benski\CatalogueBundle\Entity\Option\OptionACocher'
      ));
   }

   /**
    * @return string
    */
   public function getName() {
      return 'benski_cataloguebundle_option_optionacocher';
   }

}
