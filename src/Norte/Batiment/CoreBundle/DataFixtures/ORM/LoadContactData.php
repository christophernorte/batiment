<?php

namespace Norte\Batiment\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Norte\Batiment\CoreBundle\Entity\Contact;

/**
 * Description of LoadPresentationData
 *
 * @author christopher
 */
class LoadContactData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$contactTel = new Contact();
		$contactTel->setTitre("Téléphone mobile");
		$contactTel->setInformation("06 79 72 39 32");
		$manager->persist($contactTel);
		
		$contactEmail = new Contact();
		$contactEmail->setTitre("e-mail");
		$contactEmail->setInformation("norte.francois@gmail.com");
		$manager->persist($contactEmail);
		
		$manager->flush();
	}

	public function getOrder()
	{
		return 2;
	}

}
