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
        dump($traceRegistry->getTypeTraces());
        //die();
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
        dump($trace);
//        die();
        return $this->render($trace::TEMPLATE, [
            'trace' => $trace,
        ]);
    }
}
