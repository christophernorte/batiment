<?php

namespace norte\batimentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PhotoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url','text')
            ->add('commentaire','text')
            ->add('isaffiche','checkbox')
            ->add('createdAt','date')
            ->add('updatedAt','date')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Norte\Batiment\CoreBundle\Beans\Entity\Photo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'norte_batimentbundle_photo';
    }
}
