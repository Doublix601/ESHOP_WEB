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
    public function account(HttpClientInterface $client, UserInterface $user): Response
    {
        $userId = $user->getId();

        $getapi_user = $client->request('GET', 'http://localhost/ESHOP_API/public/index.php/api/users/'.$userId);
        $userdata = $getapi_user->toArray();

        return $this->render('account.html.twig', [
            //User Data
            "userdata" => $userdata,
            ]);
    }

    /**
     * @Route("/account/{id}", name="account_byid")
     */
    public function accountbyid(HttpClientInterface $client, UserInterface $user, $id): Response
    {
        if ($this->security->isGranted('ROLE_ADMIN')) {

            $getapi_user = $client->request('GET', 'http://localhost/ESHOP_API/public/index.php/api/users/'.$id);
            $userdata = $getapi_user->toArray();

            return $this->render('account.html.twig', [
                //User Data
                "userdata" => $userdata,
            ]);
        }else{
            $error = false;
            return $this->render('security/login.html.twig', [
                'error' => $error
            ]);
        }


    }
}
