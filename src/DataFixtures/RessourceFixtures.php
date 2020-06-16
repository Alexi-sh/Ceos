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

        for ($i = 1; $i <= 50; $i++) {

            $ressource = new Ressource;

            $ressource->setType($faker->randomElement($array = array('Cours', 'Devoir')))
                ->setTitre($faker->sentence($nbWords = 6, $variableNbWords = true))
                ->setDescription($faker->paragraph($nbSentences = 5, $variableNbSentences = true))
                ->setDateLimite($faker->dateTimeBetween($startDate = 'now', $endDate = '+1weeks', $timezone = 'Europe/Paris'))
                ->setLink($faker->sentence($nbWords = 6, $variableNbWords = true))
                ->setCreateAt($faker->dateTimeInInterval($startDate = '-1weeks', $interval = '+1weeks', $timezone = 'Europe/Paris'));



            $manager->persist($ressource);
        }

        $manager->flush();
    }
}