<?php

namespace App\Controller\Front;

use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AnimalController extends AbstractController
{
    #[Route('/animals', name: 'app_animals')]
    public function list(AnimalRepository $animalRepository): Response
    {
        $allAnimals = $animalRepository->findAll();
        return $this->render('front/animal/list.html.twig', [
            'animalList' => $allAnimals,
        ]);
    }
}
