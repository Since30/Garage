<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RepairController extends AbstractController
{
    #[Route('/reparation', name: 'app_repair')]
    public function index(): Response
    {
        return $this->render('repair/index.html.twig', [
            'controller_name' => 'RepairController',
        ]);
    }
}