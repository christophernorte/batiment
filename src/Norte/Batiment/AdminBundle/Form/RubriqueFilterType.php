<?php

namespace norte\adminBatimentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class RubriqueFilterType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','entity',array(
		'class' => 'adminBatimentBundle:Rubrique',
		'query_builder' => function(EntityRepository $er) {
			return $er->createQueryBuilder('r');
		}
	));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Norte\Batiment\CoreBundle\Beans\Entity\Rubrique'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'norte_adminbatimentbundle_rubrique';
    }
}
