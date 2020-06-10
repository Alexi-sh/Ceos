<?php

namespace App\Controller;

use App\Entity\Ressource;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfesseurController extends AbstractController
{
    /**
     * @Route("/professeur", name="professeur")
     */
    public function index()
    {

        $ressource = $this->getDoctrine()->getRepository(Ressource::class)->findAll();

        return $this->render('professeur/index.html.twig', [
            'ressource' => $ressource
        ]);
    }
}
