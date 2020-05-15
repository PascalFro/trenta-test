<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\Bundle\DoctrineBundle\Command\getDoctrine;
use Doctrine\Bundle\DoctrineBundle\Repository\getRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * Page d'accueil / Affiche tous les produits
     * @Route("/", name="home")
     */
    public function index(ProductRepository $repo)
    {


      return $this->render('/index.html.twig', [
          'products' => $products = $repo->findAll()
      ]);
    }
}
