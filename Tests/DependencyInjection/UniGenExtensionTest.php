<?php

namespace UniGen\Bundle\UniGenBundle\Tests\DependencyInjection;

use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use UniGen\Bundle\UniGenBundle\DependencyInjection\UniGenExtension;

class UniGenExtensionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var UniGenExtension */
    private $sut;

    /** @var ContainerBuilder|MockInterface */
    private $containerBuilderMock;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->containerBuilderMock = Mockery::mock(ContainerBuilder::class)->makePartial();

        $this->sut = new UniGenExtension();
    }

    public function testLoadShouldLoadCorrectContainerParameters()
    {
        $this->containerBuilderMock
            ->shouldReceive('setParameter')
            ->with('unigen.test_case', 'TestCase');

        $this->containerBuilderMock
            ->shouldReceive('setParameter')
            ->with('unigen.mock_framework', 'mockery');

        $this->containerBuilderMock
            ->shouldReceive('setParameter')
            ->with('unigen.path_pattern', '/src\/([a-zA-Z\/]+)/');

        $this->containerBuilderMock
            ->shouldReceive('setParameter')
            ->with('unigen.path_replacement_pattern', 'tests/${1}Test');

        $this->containerBuilderMock
            ->shouldReceive('setParameter')
            ->with('unigen.namespace_pattern', '/namespace ([a-zA-Z]+\\\\)(.*);/');

        $this->containerBuilderMock
            ->shouldReceive('setParameter')
            ->with('unigen.namespace_replacement_pattern', 'namespace ${1}Test\\\\${2};');

        $this->containerBuilderMock
            ->shouldReceive('setParameter')
            ->with('unigen.render.twig.template', 'sut_template.php.twig');

        $this->containerBuilderMock
            ->shouldReceive('setParameter')
            ->with('unigen.render.twig.template_dir', '%kernel.project_dir%/vendor/unigen/unigen/src/Resources/views');

        $this->sut->load([], $this->containerBuilderMock);
    }
}