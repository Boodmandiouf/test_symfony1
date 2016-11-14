<?php
// src/testBundle/Admin/ReservationAdmin.php

namespace testBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class ReservationAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('arrival')
            ->add('pilot')
            ->add('freeSeats')
            ->add('takeofTime')
            ->add('departure')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('arrival')
            ->add('pilot')
            ->add('freeSeats')
            ->add('takeofTime')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('pilot')
            ->add('arrival')
            ->add('freeSeats')
            ->add('takeofTime')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('arrival')
            ->add('pilot')
            ->add('freeSeats')
            ->add('takeofTime')
            ->add('departure')
        ;
    }
}