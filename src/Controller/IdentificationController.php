<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IdentificationController extends AbstractController
{
    /**
     * @Route("/", name="identification")
     */
    public function index()
    {
        return $this->render('identification/index.html.twig', [
            'controller_name' => 'IdentificationController',
        ]);
    }
}
