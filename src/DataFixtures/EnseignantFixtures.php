<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Enseignant;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EnseignantFixtures extends Fixture 
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

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
                        ->setPassword("mdp$i")
                        ->setMatiere("$matiere");
            
            $hash = $this->encoder->encodePassword($enseignant, $enseignant->getPassword());
            
            $enseignant ->setPassword($hash);


            $manager->persist($enseignant);
        }

        $enseignant = new Enseignant;

        $enseignant ->setNom("admin")
                    ->setPrenom("admin")
                    ->setEmail("admin@gmail.com")
                    ->setPassword("admin")
                    ->setMatiere("Histoire");

                $hash = $this->encoder->encodePassword($enseignant, $enseignant->getPassword());
    
                $enseignant ->setPassword($hash);
    
    
                $manager->persist($enseignant);

        


        $manager->flush();
    }
}
