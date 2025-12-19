<?php

namespace ClouduskBoilerplate;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class Plugin
{
    public function __construct(protected ContainerBuilder $container) {}

    public function boot(): void
    {
        add_action('init', [$this->container->get("ClouduskBoilerplate\Routing\Router"), 'register']);
    }
}
