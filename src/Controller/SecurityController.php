<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/loginProf", name="loginProf")
     * 
     */
    public function loginProf(AuthenticationUtils $authenticationUtils){
        
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/loginProf.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    public function redirection(){
        
        if($this->getUser()->hasRole('ROLE_USER'))
            return $this->redirect($this->generateUrl('professeur'));
        else if($this->getUser()->hasRole('ROLE_USER_ELEVE'))
            return $this->redirect($this->generateUrl('eleve'));
    }

}

