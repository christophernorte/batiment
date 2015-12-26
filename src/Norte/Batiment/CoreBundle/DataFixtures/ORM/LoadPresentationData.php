<?php

namespace Norte\Batiment\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Norte\Batiment\CoreBundle\Entity\Presentation;

/**
 * Description of LoadPresentationData
 *
 * @author christopher
 */
class LoadPresentationData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$presentation = new Presentation();
		$presentation->setId(0);
		$presentation->setTextacceuil("Test d'accueil par défaut");
		
		$manager->persist($presentation);
		$manager->flush($presentation);
	}

	public function getOrder()
	{
		return 1;
	}

}
