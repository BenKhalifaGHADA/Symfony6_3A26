<?php

namespace App\Controller;

use App\Service\MessageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'identifiant'=>5
        ]);
    }

    #[Route('/hello',name:'hello')]
    public function hello(){
        return new Response("Hello 3A26");
    }

   #[Route('/contact/{tel}',name:'contact')]
    public function contact($tel){
        return $this->render('home/contact.html.twig',['telephone'=>$tel]);
    }

    #[Route('/', name: 'home')]
    public function home(MessageGenerator $messageGenerator): Response
    {$message = $messageGenerator->getHappyMessage();
     return new Response("<h1>Citation du jour :
     </h1><p>$message</p>"); 
      } 
    }

