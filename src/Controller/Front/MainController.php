<?php

namespace App\Controller\Front;

use Jenssegers\Agent\Agent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_front_main')]
    public function index(): Response
    {
        $agent = new Agent();
        // dd($agent);
        return $this->render('front/main/index.html.twig', [
            'controller_name'   => 'MainController',
            'agent'             => $agent
        ]);
    }

    #[Route('/cv', name: 'app_front_main_download')]
    public function downloadCv()
    {
        $file = $this->getParameter('kernel.project_dir').'/public/cv/Bouysse_Florent_CV2.pdf';
        return new BinaryFileResponse($file);
    }
}
