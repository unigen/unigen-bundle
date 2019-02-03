<?php

namespace UniGen\Bundle\UniGenBundle\Tests\Command;

use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use UniGen\Bundle\UniGenBundle\Command\TestGeneratorCommand;
use UniGen\TestGenerator;

class GeneratorCommandTest extends TestCase
{
    /** @var Application */
    private $application;

    /** @var TestGenerator|MockInterface */
    private $testGeneratorMock;

    /** @var TestGeneratorCommand */
    private $sut;

    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        $this->application = new Application();
        $this->testGeneratorMock = Mockery::mock(TestGenerator::class);

        $this->sut = new TestGeneratorCommand($this->testGeneratorMock);
    }

    public function testExecute()
    {
        $this->application->setAutoExit(false);
        $this->application->add($this->sut);

        $this->testGeneratorMock
            ->shouldReceive('generate')
            ->with('dir/sutPath.php');

        $commandTester = new CommandTester($this->application->find('unigen:generate'));

        $result = $commandTester->execute(['sut_path' => 'dir/sutPath.php']);

        $this->assertEquals(0, $result);
        $this->assertEquals(
            'Test file dir/sutPath.php has been generated successfully',
            $commandTester->getDisplay()
        );
    }
}
