<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Routing\Annotation\Route;

class CallAPIController extends AbstractController
{
    /**
     * @Route("callapi/{id}", name="callapi")
     */
    public function CallAPI(HttpClientInterface $client, $id)
    {
       $getapi = $client->request('GET', 'http://51.210.148.206/API_ESHOP/public/index.php/api/product/'.$id);
      //  $getapi = $client->request('GET', 'http://51.210.148.206:8000/api/product/'.$id);

        $content = $getapi->toArray();

        //var_dump($content);
        return $this->render('call/api_product_return.html.twig', [
            'product' => $content,
        ]);
    }
}