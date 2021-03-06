<?php

namespace FDevs\CRUDBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AuthorType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fname')
            ->add('lname')
            ->add('birthday')
            ->add('about')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FDevs\CRUDBundle\Entity\Author'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fdevs_crudbundle_author';
    }
}
