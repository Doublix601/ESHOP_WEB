<?php


namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallAPIController extends AbstractController
{
    /**
     * @Route("/callapi/users/delete/{id}", name="user_delete")
     */
    public function deleteUser(HttpClientInterface $client, $id)
    {
        $client->request('DELETE', 'http://localhost:8001/api/users/delete/'.$id);

        $getapi_users = $client->request('GET', 'http://localhost/ESHOP_API/public/index.php/api/users');
        $users = $getapi_users->toArray();


        return $this->render('usersview.html.twig', [

            //Produits
            "users" => $users,

        ]);
    }
}