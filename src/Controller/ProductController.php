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

        $getapi_products = $client->request('GET', 'http://localhost:8001/api/products/get/id/'.$id, [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);

        //$getapi_products = $client->request('GET', 'http://localhost:8001/api/products/get/id/'.$id);
        $produits = $getapi_products->toArray();

        if ($langage == "FR") {
            $bouton_panier = "Ajouter au panier";

            //$stock = $stock . " en stock";
            $stock = " en stock";

            $description_titre = "Description du produit";
        }


        return $this->render('product.html.twig', [
            "produit" => $produits,

            "stock" => $stock,
            "bouton_panier" => $bouton_panier,
            "description_titre" => $description_titre,
        ]);
    }

    /**
     * @Route("/product/update/{id}", name="product_update_byid")
     */
    public function updateProduct(HttpClientInterface $client, $id)
    {
        $getapi_products = $client->request('PUT', 'http://localhost:8001/api/products/get/id/'.$id);
        $produits = $getapi_products->toArray();


        return $this->render('product.html.twig', [
            "produit" => $produits,
        ]);
    }
}