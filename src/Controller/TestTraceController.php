<?php

namespace App\Controller;

use App\Components\Trace\TraceRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestTraceController extends AbstractController
{
    #[Route('/test/trace', name: 'app_test_trace')]
    public function index(TraceRegistry $traceRegistry): Response
    {
        return $this->render('test_trace/index.html.twig', [
            'traces' => $traceRegistry->getTypeTraces(),
        ]);
    }

    #[Route('/test/trace/show/{typeTrace}', name: 'app_test_show')]
    public function show(
        TraceRegistry $traceRegistry,
        string $typeTrace): Response
    {
        $trace = $traceRegistry->getTypeTrace($typeTrace);
        return $this->render('test_trace/show.html.twig', [
            'trace' => $trace,
        ]);
    }
}
