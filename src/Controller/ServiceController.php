<?php

namespace App\Controller;
use App\Entity\Service;
use App\Entity\Categorie;
use App\Entity\Medias;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
public function addProduct(Request $request){
    $task = new Service();
    $form = $this->createFormBuilder($task)
             ->add('nom', TextType::class)
             ->add('description', TextType::class)
             ->add('Technologie', TextType::class)
             ->add('TypeMarketplace', TextType::class)
             ->add('Adresseweb', TextType::class)
             ->add('submit', SubmitType::class, ['label' => 'Create Task'])
             ->getForm();
             
              $form->handleRequest($request);
              if ($form->isSubmitted() && $form->isValid()) {
                  // $form->getData() holds the submitted values
                  // but, the original `$task` variable has also been updated
                  $task = $form->getData();
          
                  // ... perform some action, such as saving the task to the database
                  // for example, if Task is a Doctrine entity, save it!
                  $entityManager = $this->getDoctrine()->getManager();
                  $entityManager->persist($task);
                  $entityManager->flush();
          
                  return $this->redirectToRoute('service');
              }

    $Categorie = $this->getDoctrine()
    ->getRepository(Categorie::class)
    ->findAll();
    
return $this->render('Admin/AddProduct.html.twig',array('categories' => $Categorie ,'form' => $form->createView() ));

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
    $uploadDir = $this->getParameter('brochures_directory');
    if (!file_exists($uploadDir) && !is_dir($uploadDir)) {
        mkdir($uploadDir, 0775, true);
    }
    if ($file->move($uploadDir, $fileName)) {
        // get entity manager
        $em = $this->getDoctrine()->getManager();
 
        // create and set this mediaEntity
        $mediaEntity = new Medias();
        $mediaEntity->setFilename($fileName);


        // save the uploaded filename to database
        $em->persist($mediaEntity);
        $em->flush();
        $output['uploaded'] = true;
        $output['fileName'] = $fileName;

    };
    return new JsonResponse($output);
}
  /**
     * @Route("/addservice", name="addservice")
     */
    public function addservice(Request $request)
    {
        $Product  = new Service();
        $params = array();
        $em = $this->getDoctrine()->getManager();
        $datas = json_decode($request->getContent(), true);
        $categorie = $this->getDoctrine()->getRepository(Categorie::class)->find($datas['Categorie']);
        
        $Product->setNom($datas['name']);
        $Product->setDescription($datas['description']);
        //$Product->setStatus($datas['status']);
        //$Product->setCategory($categorie);
        $em->persist($Product);
            $em->flush();
        return new Response(sprintf('product created  succesfuly')); 
    }
     /**
     * @Route("/Admin/AddSimpleProduct",name="addsimpleproduct")
     */
  
    public function new(Request $request){
        $Categorie = $this->getDoctrine()
        ->getRepository(Categorie::class)
        ->findAll();
        $task = new Service();
        // $task->setNom('Write a blog post');
         //$task->setTechnologie("ddd");
    
         $form = $this->createFormBuilder($task)
             ->add('nom', TextType::class)
             ->add('description', TextType::class)
             ->add('Technologie', TextType::class)
             ->add('TypeMarketplace', TextType::class)
             ->add('Adresseweb', TextType::class)
             ->add('submit', SubmitType::class, ['label' => 'Create Task'])
             ->getForm();
             
              $form->handleRequest($request);
              if ($form->isSubmitted() && $form->isValid()) {
                  // $form->getData() holds the submitted values
                  // but, the original `$task` variable has also been updated
                  $task = $form->getData();
          
                  // ... perform some action, such as saving the task to the database
                  // for example, if Task is a Doctrine entity, save it!
                  $entityManager = $this->getDoctrine()->getManager();
                  $entityManager->persist($task);
                  $entityManager->flush();
          
                  return $this->redirectToRoute('service');
              }
 return $this->render('Admin/simpleproduct/addsimpleproduct.html.twig', [
            'form' => $form->createView(),'categories' => $Categorie
        ]);


    }
}
