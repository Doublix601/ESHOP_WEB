<?php


namespace App\Service\Cart;


use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{
    protected $session;

    public function __construct(SessionInterface $session){
        $this->session = $session;
    }

    public function add(int $id){
        $panier = $this->session->get('cart', []);

        if (!empty($panier[$id])){
            $panier[$id]++;
        }else{
            $panier[$id] = 1;
        }

        $this->session->set('cart', $panier);
    }

    public function remove(int $id){
        $panier = $this->session->get('cart', []);

        if (!empty($panier[$id])){
            unset($panier[$id]);
        }

        $this->session->set('cart', $panier);
    }

    public function flush(){
        $panier = $this->session->get('cart', []);

        $this->session->set('cart', array());
    }

    //public function getFullCart() : array {}

    //public function getTotal() : float {}
}