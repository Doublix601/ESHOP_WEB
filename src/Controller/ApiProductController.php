<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class ApiProductController extends AbstractController
{
    /**
     * @Route("/api/product/{id}", name="api_product_index", methods={"GET"})
     */
    public function index(ProductRepository $productRepository,$id)
    {
        return $this->json($productRepository->findBy(array('id' => $id)),200,[], ['groups' => 'product:read']);
    }

    /**
     * @Route("/api/product", name="api_product_store", methods={"POST"})
     */
    public function store(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, ValidatorInterface $validator){
        $jsonRecu = $request->getContent();

        try{
            $product = $serializer->deserialize($jsonRecu, Product::class, 'json');

            $product->setDeliveryOption('test');
            $product->setDeliveryPrice(50.15);

            $errors = $validator->validate($product);

            if(count($errors) > 0){
                return $this->json($errors, 400);
            }

            $em->persist($product);
            $em->flush();

            return $this->json($product, 201, [], ['groups' => 'product:read']);

        }catch (NotEncodableValueException $e){
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }

    }

}
