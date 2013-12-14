<?php

namespace Benski\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('dateOfBirth', 'date', array(
                'years' => range(1900, date('Y'))
            ))
            ->add('taille')
            ->add('poid')
            ->add('footSize')
            ->add('phoneNumber')
            ->add('address', new AddressType())
            ->add('gender', 'choice', array(
                "choices" => array(
                    1 => 'Monsieur',
                    2 => 'Madame'
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Benski\UserBundle\Entity\Person'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'benski_userbundle_person';
    }
}
