<?php

namespace App\Controller\Front;

use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController

{
    #[Route('/home', name: 'app_main_home')]
    public function index(AnimalRepository $animalRepository): Response
    {
        $allAnimals = $animalRepository->findAll();
        return $this->render('main/index.html.twig', [
            'animalList' => $allAnimals
        ]);
    }
}
