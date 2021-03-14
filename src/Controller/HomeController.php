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
            //nav
            $nav_categorie = "Catégories";
            $nav_la_marque = "La marque";
                $nav_qsn = "Qui sommes-nous ?";
                $nav_no = "Nos origines";
            $nav_contact = "Contact";
            $nav_liste_envie = "Ma liste d'envie";
            $nav_panier = "Mon panier";
            $nav_mon_compte = "Mon compte";
        }


        $getapi_products = $client->request('GET', 'http://localhost/ESHOP_API/public/index.php/api/products/get');
        $produits = $getapi_products->toArray();

        $getapi_categories = $client->request('GET', 'http://localhost/ESHOP_API/public/index.php/api/categories/get');
        $categories = $getapi_categories->toArray();


        return $this->render('base.html.twig', [
            //nav
            "nav_categories" => $nav_categorie,
            "nav_la_marque" => $nav_la_marque,
                "nav_qsn" => $nav_qsn,
                "nav_no" => $nav_no,
            "nav_contact" => $nav_contact,
            "nav_liste_envie" => $nav_liste_envie,
            "nav_panier" => $nav_panier,
            "nav_mon_compte" => $nav_mon_compte,

            //Produits
            "produits" => $produits,

            //Categories
            "categories" => $categories,

            //Meilleures ventes
            "meilleures_ventes" => $meilleures_ventes,

            //Derniers Articles
            "nouveaux_articles" => $nouveaux_articles,

        ]);
    }
}