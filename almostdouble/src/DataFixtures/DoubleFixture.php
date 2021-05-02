<?php

namespace App\DataFixtures;

use App\Entity\Double;
use App\Entity\ListeCouples;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DoubleFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 20; $i++) {
            $listcouples = new ListeCouples();
            for ($j = 0; $j < 10; $j++) {
                $double = new Double();
                $double->setNumber1($j * $i)
                    ->setNumber2($j * $i + $i % 3)
                    ->setAskResult($j % 2 == 0);
                $manager->persist($double);
                $listcouples->addCouple($double);
            }
            $manager->persist($listcouples);
        }

        $manager->flush();
    }
}
