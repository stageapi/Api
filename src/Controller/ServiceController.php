<?php

namespace App\Controller;
use App\Entity\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
class ServiceController extends AbstractController
{
    private $em;
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
        $services = $this->getDoctrine()
        ->getRepository(Service::class)
        ->findAll();
        $product = new Service();
       $products = $product->test();
      //  var_dump(array_keys(get_object_vars($product)));

       
       // $products = $product->test();
        return $this->render('Admin/products.html.twig',
        array('services' => $services,'products' => $products)
    );

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
    /**
     * @Route("/getAllservice",name="getAllservice")
     * 
     */
    public function getservices(){
    $services = $this->getDoctrine()
    ->getRepository(Service::class)
    ->findAll();
    return $this->render(
        'Admin/gridProduct.html.twig',
        array('services' => $services)
    );
    }
    public function AAA(){
     
        return 52;
    }
    public function __construct(){
        
    }
  
}
