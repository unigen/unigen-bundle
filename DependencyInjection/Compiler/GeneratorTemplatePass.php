<?php

namespace UniGen\Bundle\UniGenBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class GeneratorTemplatePass implements CompilerPassInterface
{
    const TEMPLATE_PATH = '/../vendor/unigen/unigen/src/Resources/views';

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if ($container->has('twig.loader.filesystem')) {
            $container
                ->getDefinition('twig.loader.filesystem')
                ->addMethodCall('addPath', [
                    $container->getParameter('kernel.root_dir') . self::TEMPLATE_PATH
                ]);
        }
    }
}
