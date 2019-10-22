<?php

namespace App\Controller;
use App\Entity\Service;
use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
        $services = $this->getDoctrine()
        ->getRepository(Service::class)
        ->findAll();
        $product = new Service();
       $products = $product->test();
     //data-url="https://examples.wenzhixin.net.cn/examples/bootstrap_table/data"
        return $this->render('Admin/gridProduct.html.twig',
        array('services' => $services,'products' => $products));

    }
    /**
     * @Route("/Admin/AddProduct",name="addproduct")
     */
public function addProduct(){
    $Categorie = $this->getDoctrine()
    ->getRepository(Categorie::class)
    ->findAll();
return $this->render('Admin/AddProduct.html.twig',array('categories' => $Categorie));

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
    /**
  * @Route("/fileuploadhandler", name="fileuploadhandler")
  */
 public function fileUploadHandler(Request $request) {
    $output = array('uploaded' => false);
    // get the file from the request object
    $file = $request->files->get('file');
    // generate a new filename 
    $fileName = md5(uniqid()).'.'.$file->guessExtension();
 
    // set your uploads directory
    $uploadDir = '/public/images/uploads/';
    if (!file_exists($uploadDir) && !is_dir($uploadDir)) {
        mkdir($uploadDir, 0775, true);
    }
    if ($file->move($uploadDir, $fileName)) {
        // get entity manager
        $em = $this->getDoctrine()->getManager();
 
        // create and set this mediaEntity
        $mediaEntity = new Service();
        $mediaEntity->setPhoto($fileName);
        $mediaEntity->setNom("ahmed");
        $mediaEntity->setDescription("sdsd");
        $mediaEntity->setTechnologie("hhhh");
        $mediaEntity->setTypeMarketplace("fdfdfd");
        $mediaEntity->setAdresseweb("dddd");

        // save the uploaded filename to database
        $em->persist($mediaEntity);
        $em->flush();
        $output['uploaded'] = true;
        $output['fileName'] = $fileName;

    };
    return new JsonResponse($output);
}
  
}
