<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TestRequeteController extends AbstractController
{
    #[Route('/test/requete', name: 'app_test_requete')]
    public function index(HttpClientInterface $client): Response
    {
        //https://symfony.com/doc/current/http_client.html
//        $response = $client->request(
//            'GET',
//            'https://api.github.com/repos/symfony/symfony-docs'
//        );
       $response = $client->request(
            'GET',
            'http://localhost:8888'
        );

        return $this->render('test_requete/index.html.twig', [
            'reponses' => $response->toArray()
        ]);
    }
}
