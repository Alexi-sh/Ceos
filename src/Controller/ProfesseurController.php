<?php

namespace App\Controller;

use App\Entity\Ressource;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfesseurController extends AbstractController
{
    /**
     * @Route("/professeur", name="professeur")
     */
    public function index()
    {

        $ressource = $this->getDoctrine()->getRepository(Ressource::class)->findAll();
        $user = $this->get('security.token_storage')->getToken()->getUser();

        return $this->render('professeur/index.html.twig', [
            'ressource' => $ressource,
            'user' => $user
        ]);
    }


}

// class SomeClass
// {
//     /**
//      * @var Security
//      */
//     private $security;

//     public function __construct(Security $security)
//     {
//        $this->security = $security;
//     }

//     public function privatePage(): Response
//     {
//         $user = $this->security->getUser(); 
//     }
// }
