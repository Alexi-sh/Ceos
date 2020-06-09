<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Migrations\Version\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ClasseFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for($i= 1; $i <= 6; $i ++){

            $classe = new Classe();

            $classe->setNiveau("Yolo")
                    ->setSection("bip boup")
                    -

                    $manager->persist($classe);
        }

        $manager->flush();
    }
}
