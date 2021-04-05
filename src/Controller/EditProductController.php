<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditProductFormType;
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

class EditProductController extends AbstractController
{
    /**
     * @Route("/editproduct/{id}", name="edit_product")
     */
    public function register(Request $request, HttpClientInterface $client, $id): Response
    {
        $title = "Modifier le produit";

        $getapi_product = $client->request('GET', 'http://localhost:8001/api/products/get/id/'.$id);
        $produit = $getapi_product->toArray();

        $form = $this->createForm(EditProductFormType::class);

        $form->get('label')->setData($produit[0]['label']);
        $form->get('brand')->setData($produit[0]['brand']);
        $form->get('ht_price')->setData($produit[0]['ht_price']);
        $form->get('tva')->setData($produit[0]['tva']);
        $form->get('description')->setData($produit[0]['description']);
        $form->get('description_courte')->setData($produit[0]['description_courte']);
        $form->get('stock')->setData($produit[0]['stock']);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $label = $form->get('label')->getData();

            $client->request('POST', 'http://localhost:8001/api/users/add', [
                'json' => [
                    'label' => $label,
                ]
            ]);
        }

        return $this->render('editproduct.html.twig', [
            'EditProductForm' => $form->createView(),
            'produit' => $produit,
            'title' => $title,
        ]);
    }
}
