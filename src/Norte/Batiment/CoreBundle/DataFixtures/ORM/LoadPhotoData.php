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
        $basePath = "/bundles/batiment/images/photo/";

        // Darksider
        $photoDarksider = new Photo();
        $photoDarksider->setUrl($basePath . "darksiders.jpg");
        $photoDarksider->setIsaffiche(true);
        $photoDarksider->setIdrubrique($this->getReference("chantier1"));
        $manager->persist($photoDarksider);

        $photoDarksider2 = new Photo();
        $photoDarksider2->setUrl($basePath . "darksiders-2.jpg");
        $photoDarksider2->setIsaffiche(true);
        $photoDarksider2->setIdrubrique($this->getReference("chantier1"));
        $manager->persist($photoDarksider2);

        $photoDarksider3 = new Photo();
        $photoDarksider3->setUrl($basePath . "darksiders-3.jpg");
        $photoDarksider3->setIsaffiche(true);
        $photoDarksider3->setIdrubrique($this->getReference("chantier1"));
        $manager->persist($photoDarksider3);

        $photoDarksider4 = new Photo();
        $photoDarksider4->setUrl($basePath . "darksiders-4.jpg");
        $photoDarksider4->setIsaffiche(true);
        $photoDarksider4->setIdrubrique($this->getReference("chantier1"));
        $manager->persist($photoDarksider4);

        $photoDarksider5 = new Photo();
        $photoDarksider5->setUrl($basePath . "darksiders-5.jpg");
        $photoDarksider5->setIsaffiche(true);
        $photoDarksider5->setIdrubrique($this->getReference("chantier1"));
        $manager->persist($photoDarksider5);

        $photoDarksider6 = new Photo();
        $photoDarksider6->setUrl($basePath . "darksiders-6.jpg");
        $photoDarksider6->setIsaffiche(true);
        $photoDarksider6->setIdrubrique($this->getReference("chantier1"));
        $manager->persist($photoDarksider6);

        $photoDarksider7 = new Photo();
        $photoDarksider7->setUrl($basePath . "darksiders-7.jpg");
        $photoDarksider7->setIsaffiche(true);
        $photoDarksider7->setIdrubrique($this->getReference("chantier1"));
        $manager->persist($photoDarksider7);

        $photoDarksider8 = new Photo();
        $photoDarksider8->setUrl($basePath . "darksiders-8.jpg");
        $photoDarksider8->setIsaffiche(true);
        $photoDarksider8->setIdrubrique($this->getReference("chantier1"));
        $manager->persist($photoDarksider8);

        $photoDarksider9 = new Photo();
        $photoDarksider9->setUrl($basePath . "darksiders-9.jpg");
        $photoDarksider9->setIsaffiche(true);
        $photoDarksider9->setIdrubrique($this->getReference("chantier1"));
        $manager->persist($photoDarksider9);

        $photoDarksider10 = new Photo();
        $photoDarksider10->setUrl($basePath . "darksiders-10.jpg");
        $photoDarksider10->setIsaffiche(true);
        $photoDarksider10->setIdrubrique($this->getReference("chantier1"));
        $manager->persist($photoDarksider10);

        $photoDarksider11 = new Photo();
        $photoDarksider11->setUrl($basePath . "darksiders-11.jpg");
        $photoDarksider11->setIsaffiche(true);
        $photoDarksider11->setIdrubrique($this->getReference("chantier1"));
        $manager->persist($photoDarksider11);

        //diablo
        $photoDiablo1 = new Photo();
        $photoDiablo1->setUrl($basePath . "diablo-1.jpg");
        $photoDiablo1->setIsaffiche(true);
        $photoDiablo1->setIdrubrique($this->getReference("chantier2"));
        $manager->persist($photoDiablo1);

        $photoDiablo2 = new Photo();
        $photoDiablo2->setUrl($basePath . "diablo-2.jpg");
        $photoDiablo2->setIsaffiche(true);
        $photoDiablo2->setIdrubrique($this->getReference("chantier2"));
        $manager->persist($photoDiablo2);

        $photoDiablo3 = new Photo();
        $photoDiablo3->setUrl($basePath . "diablo-3.jpg");
        $photoDiablo3->setIsaffiche(true);
        $photoDiablo3->setIdrubrique($this->getReference("chantier2"));
        $manager->persist($photoDiablo3);

        $photoDiablo4 = new Photo();
        $photoDiablo4->setUrl($basePath . "diablo-4.jpg");
        $photoDiablo4->setIsaffiche(true);
        $photoDiablo4->setIdrubrique($this->getReference("chantier2"));
        $manager->persist($photoDiablo4);

        $photoDiablo5 = new Photo();
        $photoDiablo5->setUrl($basePath . "diablo-5.jpg");
        $photoDiablo5->setIsaffiche(true);
        $photoDiablo5->setIdrubrique($this->getReference("chantier2"));
        $manager->persist($photoDiablo5);

        $photoDiablo6 = new Photo();
        $photoDiablo6->setUrl($basePath . "diablo-6.jpg");
        $photoDiablo6->setIsaffiche(true);
        $photoDiablo6->setIdrubrique($this->getReference("chantier2"));
        $manager->persist($photoDiablo6);

        //Borderland
        $photoBorderland1 = new Photo();
        $photoBorderland1->setUrl($basePath . "borderlands-1.jpg");
        $photoBorderland1->setIsaffiche(true);
        $photoBorderland1->setIdrubrique($this->getReference("chantier3"));
        $manager->persist($photoBorderland1);

        $photoBorderland2 = new Photo();
        $photoBorderland2->setUrl($basePath . "borderlands-2.jpg");
        $photoBorderland2->setIsaffiche(true);
        $photoBorderland2->setIdrubrique($this->getReference("chantier3"));
        $manager->persist($photoBorderland2);

        // Alfa
        $photoAlfa = new Photo();
        $photoAlfa->setUrl($basePath . "Alfa-Romeo-4C-1.jpg");
        $photoAlfa->setIsaffiche(true);
        $photoAlfa->setIdrubrique($this->getReference("chantier4"));
        $manager->persist($photoAlfa);

        $photoAlfa1 = new Photo();
        $photoAlfa1->setUrl($basePath . "Alfa_romeo_8C_.jpg");
        $photoAlfa1->setIsaffiche(true);
        $photoAlfa1->setIdrubrique($this->getReference("chantier4"));
        $manager->persist($photoAlfa1);

        $photoAlfa2 = new Photo();
        $photoAlfa2->setUrl($basePath . "Alfa_Romeo_Brera_001.jpg");
        $photoAlfa2->setIsaffiche(true);
        $photoAlfa2->setIdrubrique($this->getReference("chantier4"));
        $manager->persist($photoAlfa2);

        $photoAlfa3 = new Photo();
        $photoAlfa3->setUrl($basePath . "the-alfa-romeo-6c-concept-08.jpg");
        $photoAlfa3->setIsaffiche(true);
        $photoAlfa3->setIdrubrique($this->getReference("chantier4"));
        $manager->persist($photoAlfa3);

        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }

}
