<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Enseignant;
use App\Entity\Eleve;

class RedirectionController extends AbstractController
{
    /**
     * @Route("/redirection", name="redirection")
     */
    public function index()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        if($user->hasRole('ROLE_USER'))
            return $this->redirect($this->generateUrl('professeur'));
        else if($user->hasRole('ROLE_USER_ELEVE'))
            return $this->redirect($this->generateUrl('eleve'));
    }
}
