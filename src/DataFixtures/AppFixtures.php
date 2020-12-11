<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use App\Entity\Image;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        
        for ($i=0; $i<=30; $i++){
            $ad = new Ad;
            $ad->setTitle("titre de l'annonce n°$i")
                ->setCoverImage("https://https://fakeimg.pl/1000x300")
                ->setIntroduction("voici ma nouvelle annonce qui devrait intéresser beaucoup de monde")
                ->setContent("<p>Je suis le contenu de la nouvelle annonce de Bruno</p>")
                ->setPrice(rand(30, 200))
                ->setRooms(rand(1, 5));
    
            $manager->persist($ad);
        }

        for ($i=0; $i<=1; $i)
        {
            $images = new Image;
            $images->setUrl("https://via.placeholder.com/600x400")
                    ->setCaption("Pictures_n° $i")
                    ->setAd($ad);
            
            $manager->persist($images);
        }


        $manager->flush();
    }
}
