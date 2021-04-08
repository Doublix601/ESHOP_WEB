<?php


namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Security\Core\Security;

class AdminController extends AbstractController
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
     * @Route("/admin", name="admin_panel")
     */
    public function home(HttpClientInterface $client)
    {
        if ($this->security->isGranted('ROLE_ADMIN')) {

            return $this->render('admin.html.twig', [

            ]);
        }else{
            $error = false;
            return $this->render('security/login.html.twig', [
                'error' => $error
            ]);
        }

    }
}