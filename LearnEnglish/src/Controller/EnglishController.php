<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnglishController extends AbstractController
{
    /**
     * @Route("/english", name="english")
     */
    public function index(): Response
    {
        return $this->render('english/index.html.twig', [
            'controller_name' => 'EnglishController',
        ]);
    }
}
