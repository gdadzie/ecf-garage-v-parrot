<?php

namespace App\Controller;

use App\Form\OpeningHoursType;
use App\Entity\OpeningHours;
use App\Repository\OpeningHoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OpeningHoursController extends AbstractController
{




    #[Route('/hours', name: 'app_hours')]
    public function list(Request $request): Response
    {
        $openingHours = new OpeningHours();
        $form = $this->createForm(OpeningHoursType::class, $openingHours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->entityManager->persist($openingHours);
            $this->entityManager->flush();
            $this->addFlash('success', 'Les heures d\'ouverture ont été enregistrées avec succès.');
            return $this->redirectToRoute('app_hours'); // Redirection après l'enregistrement
        }

            return $this->render('opening_hours/index.html.twig', ['form' => $form->createView(),]);
    }
}
