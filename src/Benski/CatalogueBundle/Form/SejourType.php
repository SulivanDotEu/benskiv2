<?php

namespace Benski\CatalogueBundle\Form;

use Benski\WebsiteBundle\Form\BusinessContentType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SejourType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('content', new BusinessContentType())
            ->add('published')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Benski\CatalogueBundle\Entity\Sejour'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'benski_cataloguebundle_sejour';
    }
}
