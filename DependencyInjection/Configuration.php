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
        $treeBuilder = new TreeBuilder('uni_gen');

        $rootNode = $treeBuilder->root('uni_gen');

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
                    ->end()
                ->end()
                ->arrayNode('file_system')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('twig')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('template_path')
                                ->defaultValue('sut_template.php.twig')
                                ->end()
                            ->end()
                         ->end()
                ->end();

        return $treeBuilder;
    }
}
