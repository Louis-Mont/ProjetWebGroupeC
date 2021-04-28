<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Double;
use App\Entity\DoubleSearch;
use App\Form\DoubleSearchType;
use App\Repository\DoubleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

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
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $search = new DoubleSearch();
        $form = $this->createForm(DoubleSearchType::class, $search);
        $form->handleRequest($request);

        $doubles = $paginator->paginate(
            $this->repository->findAllQuery($search),
            $request->query->getInt('page', 1),
            12
        );

        return $this->render("property/index.html.twig", [
            'current_menu' => 'list',
            'doubles' => $doubles,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/doubles/{slug}-{id}",name="double.show", requirements={"slug": "[a-z0-9\-]*"})
     *
     * @return Response
     */
    public function show(Double $double, string $slug): Response
    {
        if ($double->getSlug() !== $slug) {
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
