<?php

namespace App\Admin;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Sonata\AdminBundle\Form\Type\ModelHiddenType;
use Sonata\AdminBundle\Form\Type\ModelType;


final class CategorieAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->add('categorie',  ModelListType::class);
        $formMapper->add('nom', TextType::class);
        
	
	
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
		$datagridMapper->add('id');
        $datagridMapper->add('nom');
        
      
    
	
    }

    protected function configureListFields(ListMapper $listMapper)
    {
		        

        $listMapper->addIdentifier('nom');
         $listMapper->addIdentifier('categorie');
       
	
    }
}