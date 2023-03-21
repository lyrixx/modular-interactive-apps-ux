<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClockController extends AbstractController
{
    #[Route('/clock', name: 'app_clock')]
    public function index(): Response
    {
        return $this->render('clock/index.html.twig', [
            'controller_name' => 'ClockController',
        ]);
    }
}
