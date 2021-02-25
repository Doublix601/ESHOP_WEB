<?php


namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product")
     */

    public function home()
    {
        //Test langage
        $langage = "FR";

        //Produits
        $produit_id = $_GET["id"];
        $product = $this->getDoctrine()->getRepository(Product::class)->find($produit_id);

        $img = $product->getImg();
        if(empty($img)){
            $img = "assets/img/site/404_products.png";
        }

        $marque = $product->getBrand();
        $stock = $product->getStock();;

        if ($langage == "FR") {
            $bouton_panier = "Ajouter au panier";
            $bouton_liste_envie = "+ liste d'envie";

            $label = $product->getLabel();
            $montant_prix = $product->getTtcPrice();
            $devise = "€";
            $montant_prix = $montant_prix . $devise;
            $stock = $stock . " en stock";

            $description_titre = "Description du produit";
            $description_texte = $product->getDescription();

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
            $label = $product->getLabel();
            $montant_prix = $product->getTtcPrice();
            $devise = "€";
            $montant_prix = $montant_prix . $devise;
            $stock = $stock . " in stock";
            $bouton_panier = "Add to cart";
            $bouton_liste_envie = "+ wishlist";
            $description_titre = "Product description";
            $description_texte = $product->getDescription();

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
            "img" => $img,
            "label" => $label,
            "marque" => $marque,
            "montant_prix" => $montant_prix,
            "stock" => $stock,
            "bouton_panier" => $bouton_panier,
            "bouton_liste_envie" => $bouton_liste_envie,
            "description_titre" => $description_titre,
            "description_texte" => $description_texte,
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