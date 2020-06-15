<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Entity\Ressource;
use App\Form\RessourceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Test\FormBuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfesseurController extends AbstractController
{
    /**
     * @Route("/professeur", name="professeur")
     */
    public function index(EntityManagerInterface $manager)
    {

        $ressource = $this->getDoctrine()->getRepository(Ressource::class)->findBy(array(), array('date_limite' => 'ASC'), 10);
        $user = $this->get('security.token_storage')->getToken()->getUser();

        return $this->render('professeur/index.html.twig', [
            'ressource' => $ressource,
            'user' => $user
        ]);
    }

    /**
     * @Route("/professeur/AjouterRessource", name="creatRessource")
     */
    public function create(Request $request, EntityManagerInterface $manager)
    {
        $ressource = new Ressource();




        $form = $this->createForm(RessourceType::class, $ressource);

        $ressource->setCreateAt(new \DateTime());

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $ressource->getLink();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'),$fileName);
            $ressource->setLink($fileName);

            $manager->persist($ressource);
            $manager->flush();
        }


        return $this->render('professeur/createRessource.html.twig', ['formRessource' => $form->createView()]);
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