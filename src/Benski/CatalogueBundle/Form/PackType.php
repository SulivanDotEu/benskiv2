<?php

namespace Benski\CatalogueBundle\Form;

use Benski\WebsiteBundle\Form\BusinessContentType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PackType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('adminId')
            ->add('qualite')
            ->add('prix')
//            ->add('presentation', 'entity', array(
//                'class' => 'BenskiContentBundle:Article',
//                'property' => 'titre',))
            ->add('content', new BusinessContentType());

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Benski\CatalogueBundle\Entity\Pack'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'benski_cataloguebundle_pack';
    }

}
