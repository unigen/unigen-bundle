<?php

namespace UniGen\Bundle\UniGenBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class GeneratorTemplatePass implements CompilerPassInterface
{
    const TEMPLATE_PATH = '/../vendor/unigen/unigen/src/Resources/views';

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if ($container->has('twig.loader')) {
            $container
                ->get('twig.loader')
                ->addPath($container->getParameter('kernel.root_dir') . self::TEMPLATE_PATH);
        }
    }
}
