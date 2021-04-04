<?php

namespace App\Controller\Admin;

use App\Entity\Double;
use App\Form\DoubleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\DoubleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDoubleController extends AbstractController
{
    private $repository;

    private $em;

    public function __construct(DoubleRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
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
     * @Route("/admin/double/create", name="admin.double.new")
     *
     * @return Response
     */
    public function new(Request $request)
    {
        $double = new Double();
        $form = $this->createForm(DoubleType::class, $double);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($double);
            $this->em->flush();
            return $this->redirectToRoute('admin.double.index');
        }

        return $this->render("admin/double/new.html.twig", [
            'double' => $double,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/double/{id}", name="admin.double.edit")
     *
     * @return Response
     */
    public function edit(Double $double, Request $request)
    {
        $form = $this->createForm(DoubleType::class, $double);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            return $this->redirectToRoute('admin.double.index');
        }

        return $this->render("admin/double/edit.html.twig", [
            'double' => $double,
            'form' => $form->createView()
        ]);
    }
}
