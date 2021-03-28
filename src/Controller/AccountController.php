<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AccountController extends AbstractController
{
    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @Route("/account", name="account")
     */
    public function index(HttpClientInterface $client, UserInterface $user): Response
    {
        //Get user data
        //$userdata = $this->get('security.token_storage')->getToken()->getUser();
        //$userdata->getId();
        //dd($userdata);

        $userId = $user->getId();

        $getapi_user = $client->request('GET', 'http://localhost/ESHOP_API/public/index.php/api/users/'.$userId);
        $userdata = $getapi_user->toArray();

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

        //Vérification si utilisateur connecté
        //$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        //a verifier
        //$user = $this->getUser();

        return $this->render('account.html.twig', [

            //nav
            "nav_categories" => $nav_categorie,
            "nav_la_marque" => $nav_la_marque,
            "nav_qsn" => $nav_qsn,
            "nav_no" => $nav_no,
            "nav_contact" => $nav_contact,
            "nav_liste_envie" => $nav_liste_envie,
            "nav_panier" => $nav_panier,
            "nav_mon_compte" => $nav_mon_compte,

            //User Data
            "userdata" => $userdata,
            ]);
    }
}
