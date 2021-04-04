<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Lecon;

class LeconFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i =1; $i <=10; $i++){
            $lecon = new Lecon();
            $lecon -> setTitle("Titre de la lecon n°$i")
                ->setContent("<p>Contenu de la lecon n°$i</p>")
                ->setImage("https://via.placeholder.com/350x150")
                ->setCreatedAt(new \DateTime());
            $manager->persist($lecon);
        }

        $manager->flush();
    }
}
