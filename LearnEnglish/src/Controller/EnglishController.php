<?php

namespace App\Controller;

use App\Entity\Lecon;
use App\Repository\LeconRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnglishController extends AbstractController
{
    /**
     * @Route("/english", name="english")
     */
    public function index(LeconRepository $repo): Response
    {


        $lecons = $repo->findAll();
        return $this->render('english/index.html.twig', [
            'controller_name' => 'EnglishController',
            'lecons' => $lecons
        ]);
    }

    /**
     * @Route ("/", name="home")
     *
     **/
    public function home (){
        return $this->render('english/home.html.twig',['title'=>"Welcome"]);
    }


    /**
    * @Route ("/english/new)", name="english_create")
     **/
    public function create(){
        return $this->render('english/create.html.twig');
    }

    /**
     * @Route ("/english/{id}", name="english_show")
     */
    public function show (Lecon $lecon){


        return $this->render('english/show.html.twig',[
            'lecon' => $lecon
        ]);

    }




}
