<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, HttpClientInterface $client, Request $request): Response
    {
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


        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        //$lastUsername = $authenticationUtils->getLastUsername();



        //todo
        // pour le bouton success tu met (isValid && isCorrect)
        /*
         * debut si (isValid && isCorrect)


         $getapi_user = $client->request('POST', 'http://localhost/ESHOP_API/public/index.php/api/users/login', [

            'username' => $username,
            'mdp' => $password

        ]);
         $userdata = $getapi_user->toArray();

        si isset($userdata['apitoekn'])

            redirectToRoute => account
        sinon
            redirectToroute => login

        fin si

        fin si

        Recherche internety à fauire  => equivalence IS AUTHENTICATED FULLY symfony to nodejs

         */

        if($request->request->get('email') !== null){
            $getapi_user = $client->request('POST', 'http://localhost:8001/api/users/login', [
                'json' => [
                    'email' => $request->request->get('email'),
                    'password' => $request->request->get('password'),
                ]
            ]);

            $userdata = $getapi_user->toArray();

            dd($userdata);
        }


        return $this->render('security/login.html.twig', [
            //'last_username' => $lastUsername,
            'error' => $error,

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
