<?php

namespace norte\adminBatimentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormError;

class PhotoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('commentaire')
            ->add('isaffiche')
            ->add('idrubrique')
	    ->add('image','file',array('required' => false));
	
	$builder->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event) {
		$photo = $event->getData();
		$form = $event->getForm();
		
		// Si l'entité n'exite pas en base de données
		if (!$photo || null === $photo->getId()) {
			
			// Et que aucune image est fournit.
			if($form["image"]->getData() == null)
			{
				// On oblige l'utilisateur à en définir une.
				$form["image"]->addError(new FormError('Une photographie doit être définit'));
			}
		}
        });
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
        return 'norte_adminbatimentbundle_photo';
    }
}
