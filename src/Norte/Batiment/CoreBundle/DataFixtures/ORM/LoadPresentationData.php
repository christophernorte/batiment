<?php

namespace Norte\Batiment\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Norte\Batiment\CoreBundle\Entity\Presentation;

/**
 * Description of LoadPresentationData
 *
 * @author christopher
 */
class LoadPresentationData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$presentation = new Presentation();
		$presentation->setId(0);
		$presentation->setTextacceuil("Test d'accueil par défaut");
		
		$manager->persist($presentation);
		$manager->flush($presentation);
	}


}
