<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class ServiceController extends AbstractController
{
    /**
     * @Route("/service", name="service")
     */
    public function index()
    {
        return $this->render('Admin/menu.html.twig', [
            'controller_name' => 'ServiceController',
        ]);
    }
    /**
     * @Route("/Products",name="products")
     */
    public function products(){
        return $this->render('Admin/products.html.twig', [
            'controller_name' => 'ServiceController',
        ]);

    }
    /**
     * @Route("/Attributes",name="attributes")
     */
    public function attributes(){
        return $this->render('Admin/attributes.html.twig', [
            'controller_name' => 'ServiceController',
        ]);

    }
    /**
     * @Route("/grid",name="grid")
     * 
     */
    public function grid(){
        return $this->render('Admin/gridProduct.html.twig', [
            'controller_name' => 'ServiceController',
        ]);

    }
}
