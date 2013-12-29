<?php

namespace norte\batimentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentaireType extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('text', 'text')
			->add('idphoto', 'integer');
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
		    'data_class' => 'norte\batimentBundle\Entity\Commentaire',
		));
	}

	public function getName() {
		return 'commentaire';
	}

}
