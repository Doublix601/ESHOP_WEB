<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
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

        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,

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

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
