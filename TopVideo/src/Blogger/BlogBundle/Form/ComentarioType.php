<?php

namespace Blogger\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComentarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', null, array('label' => 'Usuario'))
            ->add('comentario', null, array('label' => 'Comentario'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Blogger\BlogBundle\Entity\Comentario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blogger_blogbundle_comentario';
    }


}
