<?php
namespace  App\AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    public function createMainMenu()
    {
        $menu = $this->factory->createItem('root');
        $menu->addChild('Orders', ['route' => 'products']);
        $menu->addChild('Payements', ['route' => 'attributes']);
        $menu->addChild('Sshipments', ['route' => 'service']);
        return $menu;
    }
    public function createSidebarMenu(array $options)
    {
        $menu = $this->factory->createItem('root');
       // $menu->setChildrenAttribute('class', 'nav navbar-nav');
        $menu->addChild('Products', ['route' => 'products']);
        $menu->addChild('Attributes', ['route' => 'attributes']);
        $menu->addChild('Options', ['route' => 'service']);
        $menu->addChild('Association types', ['route' => 'service']);
       /* foreach ($menu as $child) {
            $child->setLinkAttribute('class', 'nav-link')
                ->setAttribute('class', 'nav-item');
        }*/
        // ... add more children

        return $menu;
    }
    public function mainMenu(FactoryInterface $factory, array $options)
    {
    	$menu = $factory->createItem('root');
    	$menu->setChildrenAttribute('class', 'nav navbar-nav');
		$menu->addChild('Projects', array('route' => 'acme_hello_projects'))
			->setAttribute('icon', 'fa fa-list');
		$menu->addChild('Employees', array('route' => 'acme_hello_employees'))
			->setAttribute('icon', 'fa fa-group');
        return $menu;
    }
    public function userMenu(array $options)
    {
    	$menu = $this->factory->createItem('root');
    	$menu->setChildrenAttribute('class', 'nav navbar-nav navbar-right');
    	/*
    	You probably want to show user specific information such as the username here. That's possible! Use any of the below methods to do this.
    	if($this->container->get('security.context')->isGranted(array('ROLE_ADMIN', 'ROLE_USER'))) {} // Check if the visitor has any authenticated roles
    	$username = $this->container->get('security.context')->getToken()->getUser()->getUsername(); // Get username of the current logged in user
    	*/	
		$menu->addChild('User', array('label' => 'Hi visitor'))
			->setAttribute('dropdown', true)
			->setAttribute('icon', 'fa fa-user');
		$menu['User']->addChild('Edit profile', array('route' => 'acme_hello_profile'))
			->setAttribute('icon', 'fa fa-edit');
        return $menu;
    }
}

?>