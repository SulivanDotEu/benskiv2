<?php

namespace Benski\ContentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ImageType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('file', 'file')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Benski\ContentBundle\Entity\Image'
            //'data_class' => 'Sdz\BlogBundle\Entity\Image'
        ));
    }

    public function getName() {
        return 'benski_content_image';
    }

}
