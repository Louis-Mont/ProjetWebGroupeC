<?php

namespace App\Controller\Admin;

use App\Entity\Double;
use App\Form\DoubleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\DoubleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDoubleController extends AbstractController
{
    private $repository;

    public function __construct(DoubleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/admin", name="admin.double.index")
     *
     * @return Response
     */
    public function index()
    {
        $doubles = $this->repository->findAll();
        return $this->render('admin/double/index.html.twig', compact('doubles'));
    }

    /**
     * @Route("/admin/{id}", name="admin.double.edit")
     *
     * @return void
     */
    public function edit(Double $double)
    {
        $form = $this->createForm(DoubleType::class, $double);
        return $this->render("admin/double/edit.html.twig", [
            'double' => $double,
            'form' => $form->createView()
        ]);
    }
}
