<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Eleve;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EleveFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {

            $eleve = new Eleve;
            $nom = $faker->lastName;
            $prenom = $faker->firstName;
            $fournisseurAcces = $faker->freeEmailDomain;

            $eleve->setNom($nom)
                ->setPrenom($prenom)
                ->setEmail("$prenom.$nom@$fournisseurAcces")
                ->setPassword("mdp$i");

            $hash = $this->encoder->encodePassword($eleve, $eleve->getPassword());

            $eleve->setPassword($hash);

            $manager->persist($eleve);
        }




        $eleve = new Eleve;

        $eleve->setNom("adminE")
            ->setPrenom("adminE")
            ->setEmail("adminE@gmail.com")
            ->setPassword("adminE");

        $hash = $this->encoder->encodePassword($eleve, $eleve->getPassword());

        $eleve->setPassword($hash);


        $manager->persist($eleve);

        $manager->flush();
    }
}