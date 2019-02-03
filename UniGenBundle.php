<?php

namespace UniGen\Bundle\UniGenBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use UniGen\Bundle\UniGenBundle\DependencyInjection\Compiler\GeneratorTemplatePass;

class UniGenBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new GeneratorTemplatePass());
    }
}
