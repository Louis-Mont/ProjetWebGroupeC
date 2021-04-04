<?php

namespace App\Controller;

use App\Entity\Lecon;
use App\Form\LeconType;
use App\Repository\LeconRepository;
use Doctrine\DBAL\Types\TextType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnglishController extends AbstractController
{
    /**
     * @Route ("/english", name="english")
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
    * @Route ("/english/new", name="english_create")
     **/
    public function create(Request $request, EntityManagerInterface $entityManager){
        $lecon = new Lecon();


        $form = $this->createForm(LeconType::class, $lecon);

        $form->handleRequest($request);


        if($form->isSubmitted()&& $form->isValid()){
            $lecon->setCreatedAt(new \DateTime());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('english_show',['id' => $lecon->getId()]);
        }


        return $this->render('english/create.html.twig',[
            'formLecon' => $form->createView()
        ]);
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
