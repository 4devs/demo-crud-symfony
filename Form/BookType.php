<?php

namespace FDevs\CRUDBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BookType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('publicationDate')
            ->add('publisher', null, array('property'=>'title'))
            ->add('authors');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'FDevs\CRUDBundle\Entity\Book'
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fdevs_crudbundle_book';
    }
}
