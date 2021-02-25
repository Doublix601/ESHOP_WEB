<?php


namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */

    public function home()
    {
        //site_setup
        $site_link = "https://192.168.1.122:8000";

        //Vérification si utilisateur connecté
        // $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        // $user = $this->getUser();
        // return new Response('Well hi there '.$user->getFirstName());


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
        if ($langage == "EN") {
            $meilleures_ventes = "Best sells"; //Titre articles mis en avant EN
            $nouveaux_articles = "Lastest products"; //Titre articles mis en avant EN
            //nav
            $nav_categorie = "Categories";
            $nav_la_marque = "The Brand";
                $nav_qsn = "Who are we ?";
                $nav_no = "Our origins";
            $nav_contact = "Contact";
            $nav_liste_envie = "My wishlist";
            $nav_panier = "My cart";
            $nav_mon_compte = "My account";
        }

        //Produits
        $produits = $this->getDoctrine()->getRepository(Product::class)->findAll();


        return $this->render('base.html.twig', [

            //Setup
            "site_link" => $site_link,

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

            //Meilleures ventes
            "meilleures_ventes" => $meilleures_ventes,

            //Derniers Articles
            "nouveaux_articles" => $nouveaux_articles,

        ]);
    }
}