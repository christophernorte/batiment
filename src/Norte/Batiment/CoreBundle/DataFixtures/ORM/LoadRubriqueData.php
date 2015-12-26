<?php

namespace Norte\Batiment\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Norte\Batiment\CoreBundle\Entity\Rubrique;

/**
 * Description of LoadRubriqueData
 *
 * @author christopher
 */
class LoadRubriqueData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$chantier1 = new Rubrique();
		$chantier1->setNom("chantier1");
		$manager->persist($chantier1);
		
		$chantier2 = new Rubrique();
		$chantier2->setNom("chantier2");
		$manager->persist($chantier2);
		
		$chantier3 = new Rubrique();
		$chantier3->setNom("chantier3");
		$manager->persist($chantier3);
		
		$chantier4 = new Rubrique();
		$chantier4->setNom("chantier4");
		$manager->persist($chantier4);
		
		$chantier5 = new Rubrique();
		$chantier5->setNom("chantier5");
		$manager->persist($chantier5);
		
		$manager->flush();
		
	}

}
