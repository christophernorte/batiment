<?php

namespace Norte\Batiment\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class PresentationType extends AbstractType
{
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('textacceuil','textarea',array('attr' => array('rows' => '15','cols' => '80'),
						 'constraints' => new NotBlank()
						));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Norte\Batiment\CoreBundle\Entity\Presentation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'norte_adminbatimentbundle_presentation';
    }
}
