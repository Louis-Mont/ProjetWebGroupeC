<?php

namespace App\DataFixtures;

use App\Entity\Double;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DoubleFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 100; $i++) {
            $double = new Double();
            $double->setNumber1($i)
                ->setNumber2($i + $i % 3);
            $manager->persist($double);
        }

        $manager->flush();
    }
}
