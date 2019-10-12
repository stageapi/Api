<?php
namespace  App\AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;
class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     *
     * Add any other dependency you need
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Home', ['route' => 'service']);
     
        // ... add more children

        return $menu;
    }
    public function createSidebarMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Products', ['route' => 'service']);
        $menu->addChild('Attributes', ['route' => 'service']);
        $menu->addChild('Options', ['route' => 'service']);
        $menu->addChild('Association types', ['route' => 'service']);
        // ... add more children

        return $menu;
    }
}

?>