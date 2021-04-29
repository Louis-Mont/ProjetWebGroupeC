<?php

namespace App\Controller;

use App\Entity\DoubleSearch;
use App\Entity\ListeCouples;
use App\Repository\ListeCouplesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Routing\Annotation\Route;

class ListeCouplesController extends AbstractController
{
    private $repository;

    private $em;

    public function __construct(ListeCouplesRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }
    /**
     * @Route("/listecouples",name="listecouples.index")
     *
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        // $listcouples = $this->repository->findAll();

        $listcouples = $paginator->paginate(
            $this->repository->findAll(),
            $request->query->getInt('page', 1),
            6
        );

        return $this->render("listdouble/index.html.twig", [
            'current_menu' => 'list',
            'ldoubles' => $listcouples,
        ]);
    }

    /**
     * @Route("/listcouples/{slug}-{id}",name="listcouples.show", requirements={"slug": "[a-z0-9\-]*"})
     *
     * @return Response
     */
    public function show(ListeCouples $listcouple, string $slug): Response
    {
        if ($listcouple->getSlug() !== $slug) {
            return $this->redirectToRoute('listcouples.show', [
                'id' => $listcouple->getId(),
                'slug' => $listcouple->getSlug()
            ], 301);
        }

        return $this->render('listdouble/show.html.twig', [
            'current_menu' => 'doubles',
            'ldouble' => $listcouple
        ]);
    }
}
