<?php
namespace  App\AppBundle\Twig;
use App\Entity\Categorie;
use App\Entity\Service;
use App\Controller\ServiceController;
use App\Repository\ServiceRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
class AppExtention  extends AbstractExtension
{
 
    public function getFunctions()
    {
        return [
            new TwigFunction('calculateArea', [$this, 'calculateArea']),
            new TwigFunction('fluo', [$this, 'fluo']),
        ];
    }

    public function calculateArea(int $width, int $length)
    {
        return $width * $length;
    }
    public function fluo(){
    

     

    }
    public function getName()
    {
        return 'demo';
    }


}