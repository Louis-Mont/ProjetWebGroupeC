<?php

namespace App\Controller;

use App\Repository\DoubleRepository;
use App\Repository\ListeCouplesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     *
     * @return Response
     */
    public function index(ListeCouplesRepository $repository): Response
    {
        $listcouples = $repository->findLatest();
        return $this->render('pages/home.html.twig', [
            'ldoubles' => $listcouples
        ]);
    }
}
