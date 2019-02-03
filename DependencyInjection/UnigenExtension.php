<?php

namespace UniGen\Bundle\UniGenBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class UnigenExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('unigen.xml');

        $container->setParameter('unigen.parent_test_case', $config['config']['parent_test_case']);

        $container->setParameter('unigen.mock_object_framework', $config['config']['mock_object_framework']);

        $container->setParameter('unigen.test_target_path_pattern', $config['config']['test_target_path_pattern']);

        $container->setParameter('unigen.test_target_path_replacement_pattern',
            $config['config']['test_target_path_replacement_pattern']);

        $container->setParameter('unigen.namespace_pattern', $config['config']['namespace_pattern']);

        $container->setParameter('unigen.namespace_replacement_pattern',
            $config['config']['namespace_replacement_pattern']);

        $container->setParameter('unigen.file_system.twig.template', $config['file_system']['twig']['template_path']);
    }

}