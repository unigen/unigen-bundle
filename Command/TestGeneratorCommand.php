<?php

namespace UniGen\Bundle\UniGenBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use UniGen\TestGenerator;

class TestGeneratorCommand extends Command
{
    const ERROR_CODE = 1;
    const SUCCESS_CODE = 0;

    /** @var TestGenerator */
    private $testGenerator;

    /**
     * @param TestGenerator $testGenerator
     */
    public function __construct(TestGenerator $testGenerator)
    {
        $this->testGenerator = $testGenerator;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('unigen:generate')
            ->addArgument('sut_path', InputArgument::REQUIRED, 'Full path to class you want to test');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->testGenerator->generate($input->getArgument('sut_path'));
            $output->write("<info>Test file {$input->getArgument('sut_path')} has been generated successfully</info>");

            return self::SUCCESS_CODE;
        } catch (\Exception $exception) {
            $output->write("<error>{$exception->getMessage()}</error>");

            return self::ERROR_CODE;
        }
    }
}
