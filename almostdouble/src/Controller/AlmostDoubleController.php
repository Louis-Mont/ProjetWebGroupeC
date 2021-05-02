<?php

namespace App\Controller;

use App\Repository\ListeCouplesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\ListeCouples;
use Symfony\Component\Routing\Annotation\Route;

class AlmostDoubleController extends AbstractController
{
    private $repository;

    private $em;

    public function __construct(ListeCouplesRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/liste-{id}",name="almostdouble.index")
     *
     * @return Response
     */
    public function index(ListeCouples $listcouples)
    {
        return $this->render('pages/almostdouble.html.twig', [
            'lcouple' => $listcouples
        ]);
    }
}
