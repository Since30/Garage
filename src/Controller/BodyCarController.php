<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BodyCarController extends AbstractController
{
    #[Route('/carrosserie', name: 'app_body_car')]
    public function index(): Response
    {
        return $this->render('body_car/index.html.twig', [
            'controller_name' => 'BodyCarController',
        ]);
    }


}