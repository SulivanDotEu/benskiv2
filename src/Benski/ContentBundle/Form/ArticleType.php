<?php

namespace Benski\ContentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Benski\ContentBundle\Entity\Image;

class ArticleType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('dateCreation', 'datetime', array(
    'years' => range(2012,2030)
   ))
                ->add('langue', 'choice', array(
                    'choices' => array(
                        'fr' => 'français',
                        'nl' => 'néerlandais'
                    )
                ))
                ->add('titre')
                ->add('resume')
                ->add('contenu')
                ->add('image', new ImageType(), array('required' => false))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Benski\ContentBundle\Entity\Article'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'benski_content_article';
    }

}
