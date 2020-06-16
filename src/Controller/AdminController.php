<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Entity\Enseignant;
use App\Form\AjouterEleveType;
use App\Form\AjoutEnseignantType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminController extends AbstractController
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }



    /**
     * @Route("/admin", name="admin")
     */
    public function AjoutEleve(Request $request, EntityManagerInterface $manager)
    {
        $ajoutEleve = new Eleve();

        $form = $this->createForm(AjouterEleveType::class, $ajoutEleve);

        $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()){

            $hash = $this->encoder->encodePassword($ajoutEleve, $ajoutEleve->getPassword());

            $ajoutEleve->setPassword($hash);

            $manager->persist($ajoutEleve);
            $manager->flush();
        } 

        $ajoutEnseignant = new Enseignant();

        $form2 = $this->createForm(AjoutEnseignantType::class, $ajoutEnseignant);
    
        $form2->handleRequest($request);
    
        if ($form2->isSubmitted() && $form2->isValid()){
    
            $hash = $this->encoder->encodePassword($ajoutEnseignant, $ajoutEnseignant->getPassword());
    
            $ajoutEnseignant->setPassword($hash);
    
            $manager->persist($ajoutEnseignant);
            $manager->flush();
        }

        return $this->render('admin/index.html.twig', [
            'formAjoutEleve' => $form->createView(),
            'formAjoutEnseignant' => $form2->createView()
            ]); 
        
    }
}