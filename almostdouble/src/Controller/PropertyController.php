<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Double;
use App\Repository\DoubleRepository;
use Doctrine\ORM\EntityManagerInterface;

class PropertyController extends AbstractController
{
    private $repository;

    private $em;

    public function __construct(DoubleRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }
    /**
     * @Route("/liste",name="double.index")
     *
     * @return Response
     */
    public function index(): Response
    {
        /*$double = new Double();
        $double->setNumber1(7);
        $double->setNumber2(8);
        $em = $this->getDoctrine()->getManager();
        $em->persist($double);
        $em->flush();*/
        /*$repo = $this->getDoctrine()->getRepository(Double::class);
        dump($repo);*/
        $doubles = $this->repository->findAll();
        dump($doubles);

        return $this->render("property/index.html.twig", [
            'current_menu' => 'list',
            'doubles' => $doubles
        ]);
    }

    /**
     * @Route("/doubles/{slug}-{id}",name="double.show", requirements={"slug": "[a-z0-9\-]*"})
     *
     * @return Response
     */
    public function show(Double $double, string $slug): Response
    {
        if($double->getSlug() !== $slug){
            return $this->redirectToRoute('double.show', [
                'id' => $double->getId(),
                'slug' => $double->getSlug()
            ], 301);
        }

        return $this->render('property/show.html.twig', [
            'current_menu' => 'doubles',
            'double' => $double
        ]);
    }
}
