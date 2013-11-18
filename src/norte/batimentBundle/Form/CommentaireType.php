<?php

namespace norte\batimentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CommentaireType extends AbstractType {

	public function buildForm(FormBuilder $builder, array $options) {
		$builder->add('text','text')
			->add('idphoto','integer');
	}

	public function getName() {
		return 'norte_batimentbundle_commentairetype';
	}

	public function getDefaultOptions(array $options) {
		return array(
		    'data_class' => 'norte\batimentBundle\Entity\Commentaire'
		);
	}

}
