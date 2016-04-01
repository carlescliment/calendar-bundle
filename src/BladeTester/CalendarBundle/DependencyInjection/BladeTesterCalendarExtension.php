<?php

namespace BladeTester\CalendarBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class BladeTesterCalendarExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $classes = $config['classes']['event'];
        $container->setParameter('blade_tester_calendar.form.type.event.class', $classes['form']);
        $container->setParameter('blade_tester_calendar.classes.event.entity', $classes['entity']);
        $classes = $config['classes']['category'];
        $container->setParameter('blade_tester_calendar.classes.category.entity', $classes['entity']);
        $container->setParameter('blade_tester_calendar.form.type.category.class', $classes['form']);
        $classes = $config['classes']['setting'];
        $container->setParameter('blade_tester_calendar.classes.setting.entity', $classes['entity']);
    }
}
