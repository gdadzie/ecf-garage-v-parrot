<?php

namespace App\Controller;

use App\Repository\OpeningHoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private EntityManagerInterface $entityManager;
    private OpeningHoursRepository $openingHoursRepository;

    public function __construct(EntityManagerInterface $entityManager, OpeningHoursRepository $openingHoursRepository)
    {
        $this->entityManager = $entityManager;
        $this->openingHoursRepository = $openingHoursRepository;
    }

    public function index(): Response
    {
        $openingHoursList = $this->openingHoursRepository->findAll();

        return $this->render('home/index.html.twig', [
            'openingHoursList' => $openingHoursList,
        ]);
    }
}
