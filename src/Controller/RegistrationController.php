<?php

namespace App\Controller;

use App\Entity\User;
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

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, GuardAuthenticatorHandler $guardHandler, LoginFormAuthentificationAuthenticator $authenticator, EncoderFactoryInterface $encoderFactory, HttpClientInterface $client): Response
    {
        $form = $this->createForm(RegistrationFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $first_name = $form->get('first_name')->getData();

            $last_name = $form->get('last_name')->getData();

            $adress = $form->get('adress')->getData();

            $cp = $form->get('cp')->getData();

            $city = $form->get('city')->getData();

            $country = $form->get('country')->getData();

            $email = $form->get('email')->getData();

            $password = $form->get('plainPassword')->getData();
            $passwordEncoder = $encoderFactory->getEncoder(User::class);
            $password = $passwordEncoder->encodePassword($password,null);


            $client->request('POST', 'http://localhost:8001/api/users/add', [
                'json' => [
                    'email' => $email,
                    'password' => $password,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'adress' => $adress,
                    'cp' => $cp,
                    'city' => $city,
                    'country' => $country,
                ]
            ]);
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
