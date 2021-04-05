<?php


namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_panel")
     */
    public function home(HttpClientInterface $client)
    {
        return $this->render('admin.html.twig', [

        ]);
    }
}