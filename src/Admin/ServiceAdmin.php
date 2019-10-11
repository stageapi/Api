<?php

namespace App\Admin;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use App\Entity\Service;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

final class ServiceAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('nom', TextType::class);
		$formMapper->add('description', TextType::class);
		$formMapper->add('photo', TextType::class);
		$formMapper->add('TypeMarketplace', TextType::class);
		$formMapper->add('Adresseweb', TextType::class);
		$formMapper->add('Technologie', TextType::class);
		$formMapper->add('categorie', ModelListType::class);
	
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
		 
        $datagridMapper->add('nom');
        $datagridMapper->add('description');
        $datagridMapper->add('photo');
        $datagridMapper->add('TypeMarketplace');
        $datagridMapper->add('Adresseweb');
        $datagridMapper->add('Technologie');
        $datagridMapper->add('categorie');
	
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nom');
        $listMapper->addIdentifier('description');
        $listMapper->addIdentifier('photo');
        $listMapper->addIdentifier('TypeMarketplace');
        $listMapper->addIdentifier('Adresseweb');
        $listMapper->addIdentifier('Technologie');
        $listMapper->addIdentifier('categorie');
	
    }
	 public function getWithOpenCommentFilter($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }

        $queryBuilder
            ->leftJoin(sprintf('%s.comments', $alias), 'c')
            ->andWhere('c.status = :status')
            ->setParameter('status', Comment::STATUS_MODERATE);

        return true;
    }
}