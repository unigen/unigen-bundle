<?php

namespace UniGen\Bundle\UniGenBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('unigen');

        $rootNode
            ->children()
                ->arrayNode('config')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('parent_test_case')->defaultValue('TestCase')->end()
                        ->scalarNode('mock_object_framework')->defaultValue('mockery')->end()
                        ->scalarNode('test_target_path_pattern')->defaultValue('/src\/([a-zA-Z\/]+)/')->end()
                        ->scalarNode('test_target_path_replacement_pattern')->defaultValue('tests/${1}Test')->end()
                        ->scalarNode('namespace_pattern')->defaultValue('/([a-zA-Z]+\\)(.*)')->end()
                        ->scalarNode('namespace_replacement_pattern')->defaultValue('${1}Test\\{$2}')->end()
                ->arrayNode('file_system')
                    ->children()
                        ->arrayNode('twig')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('template_path')->defaultValue('example')->end();

        return $treeBuilder;
    }

}