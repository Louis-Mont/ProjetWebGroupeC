<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Double;

class PropertyController extends AbstractController
{
    /**
     * @Route("/liste",name="property.index")
     *
     * @return Response
     */
    public function index():Response{
        $double = new Double();
        $double->setNumber1(7);
        $double->setNumber2(8);
        $em = $this->getDoctrine()->getManager();
        $em->persist($double);
        $em->flush();
        
        return $this->render("property/index.html.twig",[
            'current_menu' => 'properties'
        ]);
    }
}