<?php

namespace App\Controller;

use App\Repository\VolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(VolRepository $vol): Response
    {
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
            'vols' => $vol->findAll(),
        ]);
    }
}
