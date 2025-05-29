<?php

namespace WPNBoilerplate\Core;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class ContainerBuilderFactory
{
    public static function build(): ContainerBuilder
    {
        $container = new ContainerBuilder();
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Config'));
        $loader->load('services.yaml');
        $container->compile();
        return $container;
    }
}
