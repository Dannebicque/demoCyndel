<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StimulusController extends AbstractController
{
    #[Route('/stimulus', name: 'app_stimulus')]
    public function index(): Response
    {
        return $this->render('stimulus/index.html.twig', [
        ]);
    }

    #[Route('/stimulus/show', name: 'app_stimulus_show')]
    public function show(Request $request): Response
    {
        return $this->render('stimulus/_show.html.twig', [
            'id' => $request->query->get('id'), //on récupère ?id= dans l'URL
        ]);
    }

    #[Route('/stimulus/deux', name: 'app_stimulus_deux')]
    public function deux(Request $request): Response
    {
        return $this->render('stimulus/_show.html.twig', [
        ]);
    }
}
