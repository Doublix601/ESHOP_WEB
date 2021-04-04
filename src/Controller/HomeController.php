<?php


namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function home(HttpClientInterface $client)
    {
        //Test langage
        $langage = "FR";

        if ($langage == "FR") {
            $meilleures_ventes = "Meilleures ventes"; //Titre meilleures ventes FR
            $nouveaux_articles = "Derniers ajouts"; //Titre articles mis en avant FR
        }

        $getapi_products = $client->request('GET', 'http://localhost:8001/api/products/get');
        $produits = $getapi_products->toArray();


        return $this->render('base.html.twig', [

            //Produits
            "produits" => $produits,

            //Meilleures ventes
            "meilleures_ventes" => $meilleures_ventes,

            //Derniers Articles
            "nouveaux_articles" => $nouveaux_articles,

        ]);
    }
}