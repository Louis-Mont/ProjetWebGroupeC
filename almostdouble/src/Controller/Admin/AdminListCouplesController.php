<?php

namespace App\Controller\Admin;

use App\Entity\ListeCouples;
use App\Form\ListCouplesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ListeCouplesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminListCouplesController extends AbstractController
{
    private $repository;

    private $em;

    public function __construct(ListeCouplesRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/admin", name="admin.listdouble.index")
     *
     * @return Response
     */
    public function index()
    {
        $listcouples = $this->repository->findAll();
        return $this->render('admin/listdouble/index.html.twig', [
            'ldoubles' => $listcouples,
            'current_menu' => 'admin'
        ]);
    }

    /**
     * @Route("/admin/listcouples/create", name="admin.listdouble.new")
     *
     * @return Response
     */
    public function new(Request $request)
    {
        $listcouples = new ListeCouples();
        $form = $this->createForm(ListCouplesType::class, $listcouples);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($listcouples);
            $this->em->flush();
            $this->addFlash('success', 'Liste créée avec succès');
            return $this->redirectToRoute('admin.listcouples.index');
        }

        return $this->render("admin/listdouble/new.html.twig", [
            'ldoubles' => $listcouples,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/listcouples/{id}", name="admin.listdouble.edit", methods="GET|POST")
     *
     * @return Response
     */
    public function edit(ListeCouples $listcouples, Request $request)
    {
        $form = $this->createForm(ListCouplesType::class, $listcouples);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success', 'Liste modifiée avec succès');
            return $this->redirectToRoute('admin.listdouble.index');
        }

        return $this->render("admin/listdouble/edit.html.twig", [
            'ldoubles' => $listcouples,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/listcouples/{id}", name="admin.listdouble.delete", methods="DELETE")
     *
     * 
     * @return Response
     */
    public function delete(ListeCouples $listcouples, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $listcouples->getId(), $request->get('_token'))) {
            $this->em->remove($listcouples);
            $this->em->flush();
            $this->addFlash('success', 'Liste supprimée avec succès');
            // return new Response('Suppression');
        }
        return $this->redirectToRoute('admin.listdouble.index');
    }
}
