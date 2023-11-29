<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserLoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Orm\EntityManagerInterface;


class UserController extends AbstractController
{

    #[Route('/user', name: 'app_user')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form=$this->createForm(User::class,$user);

        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
        }


        return $this->render('user/index.html.twig', [
            'form' => $form,
        ]);
    }

}
