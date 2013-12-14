<?php

namespace Benski\ContentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LinkType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('articles', 'entity', array(
                    'class' => 'BenskiContentBundle:Article',
                    'property' => 'titre',
                    'multiple' => 'true',
        ));
        
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Benski\ContentBundle\Entity\Link'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'benski_contentbundle_link';
    }

}
