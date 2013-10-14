<?php

namespace Benski\CatalogueBundle\Form\Option;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChoixOptionMultipleType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule')
            ->add('description')
            ->add('prix')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Benski\CatalogueBundle\Entity\Option\ChoixOptionMultiple'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'benski_cataloguebundle_option_choixoptionmultiple';
    }
}
