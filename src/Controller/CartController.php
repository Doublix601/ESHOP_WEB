<?php


namespace App\Controller;

use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;


class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function cart(HttpClientInterface $client, SessionInterface $session)
    {
        //Test langage
        $langage = "FR";

        $getapi_products = $client->request('GET', 'http://localhost/ESHOP_API/public/index.php/api/products/get');
        $produits = $getapi_products->toArray();


        $panier = $session->get('cart', []);


        $panierWithData = [];

        foreach ($panier as $id => $quantity){
            if ($id !== 1){
                $id--;
            }

            $panier_item = array($id => $produits[$id]);

            $panierWithData[] = [
                'product' => $panier_item[$id],
                'quantity' => $quantity
            ];
        }

        $total = 0;

        foreach ($panierWithData as $item){
            $totalitem = $item['product']['ttc_price'] * $item['quantity'];
            $total += $totalitem;
        }


        if ($langage == "FR") {
            //nav
            $nav_contact = "Contact";
            $nav_liste_envie = "Ma liste d'envie";
            $nav_panier = "Mon panier";
            $nav_mon_compte = "Mon compte";
        }


        return $this->render('cart.html.twig', [
            //nav
            "nav_contact" => $nav_contact,
            "nav_liste_envie" => $nav_liste_envie,
            "nav_panier" => $nav_panier,
            "nav_mon_compte" => $nav_mon_compte,

            "items" => $panierWithData,
            "total" => $total

        ]);
    }

    /**
     * @Route("/cart/add/{id}", name="cart_add")
     */
    public function add($id, CartService $cartService){

        $cartService->add($id);

        return $this->redirectToRoute("cart");
    }


    /**
     * @Route("/cart/remove/{id}", name="cart_remove")
     */
    public function remove($id, CartService $cartService){

        $cartService->remove($id);

        return $this->redirectToRoute("cart");
    }

}