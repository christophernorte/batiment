<?php

namespace norte\batimentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentaireType extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('text', 'text')
			->add('idphoto', new PhotoType());
			
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
		    'data_class' => 'Norte\Batiment\CoreBundle\Beans\Entity\Commentaire',
		    'cascade_validation' => false
		));
	}

	public function getName() {
		return 'norte_batimentbundle_commentaire';
	}

}
