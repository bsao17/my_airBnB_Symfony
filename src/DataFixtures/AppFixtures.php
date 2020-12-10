<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use Cocur\Slugify\Slugify;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $slugify = new Slugify();
        
        for ($i=0; $i<=30; $i++){
            $ad = new Ad;
            $title = $slugify->slugify("titre-de-l-annonce-n-$i");
            $ad->setTitle("titre de l'annonce n°$i")
                ->setSlug($title)
                ->setCoverImage("https://via.placeholder.com/1000x300")
                ->setIntroduction("voici ma nouvelle annonce qui devrait intéresser beaucoup de monde")
                ->setContent("<p>Je suis le contenu de la nouvelle annonce de Bruno</p>")
                ->setPrice(rand(30, 200))
                ->setRooms(rand(1, 5));
    
            $manager->persist($ad);
        }


        $manager->flush();
    }
}
