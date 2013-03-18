<?php

namespace BladeTester\CalendarBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('blade_tester_calendar');

        $rootNode
            ->children()
                ->scalarNode('driver')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('engine')->defaultValue('twig')->end()
            ->end();

        $this->addClassesSection($rootNode);
        $this->addServicesSection($rootNode);

        return $treeBuilder;
    }

    /**
     * Adds `classes` section.
     *
     * @param ArrayNodeDefinition $node
     */
    private function addClassesSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('classes')
                    ->isRequired()
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('event')
                            ->isRequired()
                            ->children()
                                ->scalarNode('form')->defaultValue('BladeTester\\CalendarBundle\\Form\\Type\\EventFormType')->end()
                                ->scalarNode('entity')->defaultValue('BladeTester\\CalendarBundle\\Entity\\Event')->end()
                            ->end()
                        ->end()
                        ->arrayNode('category')
                            ->isRequired()
                            ->children()
                                ->scalarNode('form')->defaultValue('BladeTester\\CalendarBundle\\Form\\Type\\EventCategoryFormType')->end()
                                ->scalarNode('entity')->defaultValue('BladeTester\\CalendarBundle\\Entity\\EventCategory')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }


    /**
     * Adds `services` section.
     *
     * @param ArrayNodeDefinition $node
     */
    private function addServicesSection(ArrayNodeDefinition $node)
    {
    }
}
