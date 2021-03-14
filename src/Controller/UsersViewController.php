<?php


namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class UsersViewController extends AbstractController
{
    /**
     * @Route("/usersview", name="usersview")
     */

    public function home(HttpClientInterface $client)
    {
        //Test langage
        $langage = "FR";


        $getapi_users = $client->request('GET', 'http://localhost/ESHOP_API/public/index.php/api/users/get');
        $users = $getapi_users->toArray();

        $getapi_categories = $client->request('GET', 'http://localhost/ESHOP_API/public/index.php/api/categories/get');
        $categories = $getapi_categories->toArray();

        //$marque = $product->getBrand();
        //$stock = $product->getStock();;

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


        return $this->render('usersview.html.twig', [
            //nav
            "nav_categories" => $nav_categorie,
            "nav_la_marque" => $nav_la_marque,
            "nav_qsn" => $nav_qsn,
            "nav_no" => $nav_no,
            "nav_contact" => $nav_contact,
            "nav_liste_envie" => $nav_liste_envie,
            "nav_panier" => $nav_panier,
            "nav_mon_compte" => $nav_mon_compte,

            "users" => $users,
            "categories" => $categories,
        ]);
    }
}