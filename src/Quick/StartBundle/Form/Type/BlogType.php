<?php

namespace Quick\StartBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlogType extends AbstractType
{   
    /**
     * Sets default options
     * 
     * @param \Quick\StartBundle\Form\Type\OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'        => 'Quick\StartBundle\Entity\Blog',
            'csrf_protection'   => true,
            'csrf_field_name'   => '_token',
            'intention'         => 'blog_item'
        ));
    }
    
    /**
     * Build form
     * 
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('link', 'url')
            ->add('text', 'textarea', array(
                'attr' => array('cols' => 50, 'rows' =>  5)
            ))
            ->add('image', 'file')
            ->add('save', 'submit');
    }
    
    /**
     * Gets name
     * 
     * @return string
     */
    public function getName()
    {
        return 'blog';
    }
}