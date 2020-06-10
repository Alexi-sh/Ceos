<?php

namespace App\DataFixtures;

use App\Entity\Ressource;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Migrations\Version\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;

class RessourceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for($i= 1; $i <= 6; $i ++){

            $ressource = new Ressource;

            $ressource->setType($faker->randomElement($array = array ('cours','devoir_a_rendre','devoir_rendu')))
                      ->setTitre($faker->word())
                      ->setDescription($faker->paragraph($nbSentences = 5, $variableNbSentences = true))
                      ->setDatelimite($faker->dateTimeBetween($startDate = 'now', $endDate = '+2weeks', $timezone = 'Europe/Paris'))
                      ->setLink($faker->sentence($nbWords = 6, $variableNbWords = true))
                      ->setCreateAt($faker->dateTimeAD($max = 'now', $timezone = 'Europe/Paris'));

                    $manager->persist($ressource);
        }

        $manager->flush();
    }
}
