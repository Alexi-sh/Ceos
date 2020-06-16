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
                ->setLink("dummy.pdf")
                ->setCreateAt($faker->dateTimeInInterval($startDate = '-1weeks', $interval = '+1weeks', $timezone = 'Europe/Paris'))
                ->setProf($faker->randomElement($array = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11')));



            $manager->persist($ressource);
        }

        $manager->flush();
    }
}