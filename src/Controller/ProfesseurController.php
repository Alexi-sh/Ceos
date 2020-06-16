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
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfesseurController extends AbstractController
{
    /**
     * @Route("/professeur", name="professeur")
     */
    public function index(EntityManagerInterface $manager)
    {

        $ressource = $this->getDoctrine()->getRepository(Ressource::class)->findBy(array(), array('datelimite' => 'desc'), 10, null);
        $user = $this->get('security.token_storage')->getToken()->getUser();
        dump($ressource);
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

        dump($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // $file = $ressource->getLink();

            $file = $form['link']->getData();
            dump($file);

            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'),$fileName);
            $ressource->setLink($fileName);

            

            $manager->persist($ressource);
            $manager->flush();
        }


        return $this->render('professeur/createRessource.html.twig', ['formRessource' => $form->createView()]);
    }
}