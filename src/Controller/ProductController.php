<?php


namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id}", name="product_byid")
     */

    public function home(HttpClientInterface $client, $id)
    {
        //Test langage
        $langage = "FR";


        $getapi_products = $client->request('GET', 'http://localhost/ESHOP_API/public/index.php/api/product/get/id/'.$id);
        $produits = $getapi_products->toArray();

        if ($langage == "FR") {
            $bouton_panier = "Ajouter au panier";

            //$stock = $stock . " en stock";
            $stock = " en stock";

            $description_titre = "Description du produit";

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
            //$label = $product->getLabel();
            //$montant_prix = $product->getTtcPrice();
            $devise = "€";
            //$montant_prix = $montant_prix . $devise;
            $stock = $stock . " in stock";
            $bouton_panier = "Add to cart";
            $description_titre = "Product description";
            //$description_texte = $product->getDescription();

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



        return $this->render('product.html.twig', [
            "produit" => $produits,

            //"img" => $img,
            //"label" => $label,
            //"marque" => $marque,
            //"montant_prix" => $montant_prix,
            "stock" => $stock,
            "bouton_panier" => $bouton_panier,
            "description_titre" => $description_titre,
            //"description_texte" => $description_texte,
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