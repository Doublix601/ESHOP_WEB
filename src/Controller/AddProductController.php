<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProductFormType;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthentificationAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class AddProductController extends AbstractController
{
    /**
     * @Route("/addproduct", name="add_product")
     */
    public function register(Request $request, HttpClientInterface $client): Response
    {
        $title = "Ajouter un produit";
        $button = "Ajouter";

        $form = $this->createForm(ProductFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $label = $form->get('label')->getData();
            $brand = $form->get('brand')->getData();
            $tva = $form->get('tva')->getData();
            $ht_price = $form->get('ht_price')->getData();
            $description = $form->get('description')->getData();
            $description_courte = $form->get('description_courte')->getData();

            $client->request('POST', 'http://localhost:8001/api/products/add', [
                'json' => [
                    'label' => $label,
                    'brand' => $brand,
                    'tva' => $tva,
                    'ht_price' => $ht_price,
                    'description' => $description,
                    'description_courte' => $description_courte,
                ]
            ]);
        }

        return $this->render('AddOrEditProduct.html.twig', [
            'ProductForm' => $form->createView(),
            'title' => $title,
            'button' => $button,
        ]);
    }
}
