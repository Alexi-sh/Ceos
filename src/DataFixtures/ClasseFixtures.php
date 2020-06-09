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

            $classe = new Classe;

            $classe->setNiveau($faker->randomElement($array = array ('6','5','4','3')))
                    ->setSection($faker->randomElement($array = array ('A','B','C')));

                    $manager->persist($classe);
        }

        $manager->flush();
    }
}
