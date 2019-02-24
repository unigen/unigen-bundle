<?php

namespace UniGen\Bundle\UniGenBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class UniGenExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../../Resources/config'));
        $loader->load('unigen.xml');

        $container->setParameter('unigen.test_case', $config['config']['test_case']);
        $container->setParameter('unigen.mock_framework', $config['config']['mock_framework']);
        $container->setParameter('unigen.path_pattern', $config['config']['path_pattern']);
        $container->setParameter('unigen.path_replacement_pattern', $config['config']['path_replacement_pattern']);
        $container->setParameter('unigen.namespace_pattern', $config['config']['namespace_pattern']);
        $container->setParameter('unigen.namespace_replacement_pattern',
            $config['config']['namespace_replacement_pattern']);
        $container->setParameter('unigen.render.twig.template', $config['render']['twig']['template']);
        $container->setParameter('unigen.render.twig.template_dir', $config['render']['twig']['template_dir']);
    }
}
