<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProjectAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title' , 'text')
            ->add('description', 'textarea')
            ->add('workspace','sonata_type_model',
                array(
                    'class' => 'AppBundle\Entity\Workspace',
                    'property' => 'name'
                ))
            ->add('dueDate', 'date',
                array(
                    'input'  => 'datetime',
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
        $datagridMapper->add('description');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title');
        $listMapper->addIdentifier('description');
    }
}