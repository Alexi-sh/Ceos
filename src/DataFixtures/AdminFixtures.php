<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
         $admin = new Admin();

         $admin ->setEmail("admin@admin.com")
                ->setPassword("admin");

         $hash = $this->encoder->encodePassword($admin, $admin->getPassword());

         $admin->setPassword($hash);

         $manager->persist($admin);

        $manager->flush();
    }
}
