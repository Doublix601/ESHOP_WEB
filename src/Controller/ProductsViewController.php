<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProductsViewController extends AbstractController
{
    /**
     * @Route("/productsview", name="productsview")
     */

    public function userview(HttpClientInterface $client)
    {
        //Test langage
        $langage = "FR";


        $getapi_produits = $client->request('GET', 'http://localhost/ESHOP_API/public/index.php/api/products/get');
        $produits = $getapi_produits->toArray();


        if ($langage == "FR") {
            //nav
            $nav_contact = "Contact";
            $nav_liste_envie = "Ma liste d'envie";
            $nav_panier = "Mon panier";
            $nav_mon_compte = "Mon compte";
        }


        return $this->render('productsview.html.twig', [
            //nav
            "nav_contact" => $nav_contact,
            "nav_liste_envie" => $nav_liste_envie,
            "nav_panier" => $nav_panier,
            "nav_mon_compte" => $nav_mon_compte,

            "products" => $produits,
        ]);
    }
}