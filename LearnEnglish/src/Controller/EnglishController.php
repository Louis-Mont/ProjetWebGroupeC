<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnglishController extends AbstractController
{
    /**
     * @Route("/lecon", name="lecon")
     */
    public function index(): Response
    {
        return $this->render('english/index.html.twig', [
            'controller_name' => 'EnglishController',
        ]);
    }

    /**
     * @Route ("/", name="home")
     *
     **/
    public function home (){
        return $this->render('english/home.html.twig',['title'=>"Welcome"]);
    }


}
