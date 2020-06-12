<?php

namespace App\Controller;

use App\Entity\Ressource;
use App\Repository\RessourceRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EleveController extends AbstractController
{
    /**
     * @Route("/eleve", name="eleve")
     */
    public function index(RessourceRepository $repo)
    {

        // $ressource = $repo->findAll();
        $ressource = $repo->findBy(array(),array('createAt' => 'ASC'));
        $user = $this->get('security.token_storage')->getToken()->getUser();

        return $this->render('eleve/index.html.twig', [
            'ressource' => $ressource,
            'user' => $user
        ]);
    }
}
