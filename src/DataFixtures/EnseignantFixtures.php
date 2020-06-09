<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Enseignant;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EnseignantFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i=1; $i <=10; $i++) { 
            
            $enseignant = new Enseignant;
            $nom = $faker->lastName;
            $prenom = $faker->firstName;
            $fournisseurAcces = $faker->freeEmailDomain;
            $matiere = $faker->randomElement($array = array ('Français','Anglais','Mathématique','Histoire','Technologie')); // 

            $enseignant ->setNom($nom)
                        ->setPrenom($prenom)
                        ->setEmail("$prenom.$nom@$fournisseurAcces")
                        ->setMdp("mdp$i")
                        ->setMatiere("$matiere");

                        $manager->persist($enseignant);
        }

        


        $manager->flush();
    }
}
