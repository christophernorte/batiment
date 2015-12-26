<?php

namespace Norte\Batiment\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Norte\Batiment\CoreBundle\Entity\Photo;

/**
 * Description of LoadPhotoData
 *
 * @author christopher
 */
class LoadPhotoData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$basePath = "bundles/batiment/images/photo/";
		
		//darksiders-2
		$photoDarksider2 = new Photo();
		$photoDarksider2->setUrl($basePath."darksiders-2.jpg");
		$photoDarksider2->setIsaffiche(true);
		$photoDarksider2->setIdrubrique($this->getReference("chantier1"));
		$manager->persist($photoDarksider2);
		
		$manager->flush();
	}

	public function getOrder()
	{
		return 4;
	}

}
