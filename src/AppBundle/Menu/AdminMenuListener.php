<?php

namespace AppBundle\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

class AdminMenuListener
{
    public function buildMenu(MenuBuilderEvent $event)
    {
        $menu = $event->getMenu();

        $blogMenu = $menu
            ->addChild('blog')
            ->setLabel('Blog');
        $blogMenu
            ->addChild('posts', [ 'route' => 'app_post_index' ])
            ->setLabel('Posts');
    }
}
