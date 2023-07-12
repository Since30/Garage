<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\SaleFormType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use App\Entity\SaleCars;



class SaleController extends AbstractController
{
    #[Route('/vente', name: 'app_sale')]
    public function index(Request $request, PersistenceManagerRegistry $doctrine): Response
    {
        $sale = new SaleCars();
        $form = $this->createForm(SaleFormType::class, $sale);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $sale = $form->getData();
            $em = $this->$doctrine->getManager();
            $em->persist($sale);
            $em->flush();

            $this->addFlash('success', 'Votre annonce a bien été enregistrée');

            return $this->redirectToRoute('app_sale');
        }
        $form = $this->createForm(SaleFormType::class);
        return $this->render('sale/index.html.twig', [
            'controller_name' => 'SaleController',
            'form' => $form->createView(),

        ]);
    }
}