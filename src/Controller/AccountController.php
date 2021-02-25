<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account")
     */
    public function index(): Response
    {
        //site_setup
        $site_link = "https://192.168.1.122:8000";

        //Test langage
        $langage = "FR";

        if ($langage == "FR") {
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

        //Vérification si utilisateur connecté
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        return $this->render('account.html.twig', [
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
            ]);


        //Test langage
        $langage = "FR";

        if ($langage == "FR") {
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



        return $this->render('account.html.twig', [
            'controller_name' => 'AccountController',

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
        ]);
    }
}
