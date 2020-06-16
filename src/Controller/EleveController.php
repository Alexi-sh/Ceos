<?php

namespace App\Controller;

use App\Entity\Ressource;
use App\Repository\EnseignantRepository;
use App\Repository\RessourceRepository;
use phpDocumentor\Reflection\Types\Resource_;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EleveController extends AbstractController
{
    /**
     * @Route("/eleve", name="eleve")
     */
    public function index(RessourceRepository $repo, EnseignantRepository $prof)
    {;
        // $ressource = $repo->findAll();
        $ressource = $repo->findBy(array(), array('datelimite' => 'asc'), 6, null);
        $ContactProf = $prof->findAll();
        $user = $this->get('security.token_storage')->getToken()->getUser();

        return $this->render('eleve/index.html.twig', [
            'ressource' => $ressource,
            'user' => $user,
            'enseigant' => $ContactProf
        ]);
    }

    /**
     * @Route("/eleve/ressources", name="ressource_eleve")
     */
    public function ressources(RessourceRepository $repo, EnseignantRepository $prof)
    {

        // $ressource = $repo->findAll();
        $ressource = $repo->findBy(array(), array('datelimite' => 'asc'), null, null);
        $ContactProf = $prof->findAll();
        $user = $this->get('security.token_storage')->getToken()->getUser();

        return $this->render('eleve/ressource.html.twig', [
            'ressource' => $ressource,
            'user' => $user,
            'enseigant' => $ContactProf
        ]);
    }

    /**
     * @route("/ressources/{id}", name="ressource_show")
     */
    public function show(Ressource $ressource)
    {

        dump($ressource);

        return $this->render('eleve/show.html.twig', [
            'ressource' => $ressource
        ]);
    }
}