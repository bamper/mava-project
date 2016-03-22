<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Builder extends ContainerBuilder
{
    /**
     * @param FactoryInterface $factory
     * @param array $options
     * @return \Knp\Menu\ItemInterface
     */
    public function topMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-top-links navbar-right');

        // Create a dropdown with a caret
        $dropdown = $menu->addChild('', array(
            'icon' => 'user',
            'dropdown' => true,
            'caret' => true,
        ));

        // Create a dropdown header
        $dropdown->addChild('Edit Profile', array('route' => 'sonata_user_profile_edit'));
        $dropdown->addChild('Change Password', array('route' => 'sonata_user_change_password'));
        $dropdown->addChild('Logout', array('route' => 'sonata_user_security_logout'));

        $dropdown2 = $menu->addChild(' ', array(
            'icon' => 'bell',
            'dropdown' => true,
            'caret' => true,
        ));

        // Create a dropdown header
        $dropdown2->addChild('notifications', array('dropdown-header' => true))
            ->setAttribute('divider_append', true);
        return $menu;
    }

    /**
     * @param FactoryInterface $factory
     * @param array $options
     * @return \Knp\Menu\ItemInterface
     */
    public function sideMenu(FactoryInterface $factory, array $options)
    {
        // Menu will be a navbar menu anchored to right
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('id', 'side-menu');
        $menu->setChildrenAttribute('class', 'nav');
        // Create a dropdown with a caret
        $menu->addChild('Dashboard', array(
            'icon' => 'dashboard',
            'route' => 'dashboard_index'
        ));
        // Create a dropdown header
        $dropdown = $menu->addChild('Project', array(
            'icon'  => 'tasks',
            'dropdown' => true,
            'caret' => true,
        ));
        $dropdown->setChildrenAttribute('class', 'nav nav-second-level');
        $dropdown->addChild("Project1", array('uri' => '#'));
        $dropdown->addChild("Project2", array('uri' => '#'));
        $menu->addChild('Team', array(
            'icon' => 'users',
            'uri'  => '#',
        ));
        return $menu;
    }
}