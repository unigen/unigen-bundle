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
                        ->scalarNode('test_case')->defaultValue('TestCase')->end()
                        ->scalarNode('mock_framework')->defaultValue('mockery')->end()
                        ->scalarNode('path_pattern')->defaultValue('/src\/([a-zA-Z\/]+)/')->end()
                        ->scalarNode('path_replacement_pattern')->defaultValue('tests/${1}Test')->end()
                        ->scalarNode('namespace_pattern')->defaultValue('/([a-zA-Z]+\\)(.*)')->end()
                        ->scalarNode('namespace_replacement_pattern')->defaultValue('${1}Test\\{$2}')->end()
                    ->end()
                ->end()
                ->arrayNode('render')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('twig')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('template')->defaultValue('sut_template.php.twig')->end()
                                ->scalarNode('template_dir')
                                ->defaultValue(__DIR__ . '/../Resources/views')->end()
                            ->end()
                         ->end()
                ->end();

        return $treeBuilder;
    }
}
