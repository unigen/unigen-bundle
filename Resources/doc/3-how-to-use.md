### How to use

Run command from cli

```bash
bin/console unigen:generate ./src/TestGenerator.php
```

Will produce

```php
<?php

namespace UniGen\Test;

use UniGen\Config;
use UniGen\Renderer\RendererInterface;
use UniGen\FileSystem\FileSystemInterface;
use UniGen\Sut\SutProviderInterface;
use Mockery;
use Mockery\MockInterface as MockObject;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;
use UniGen\TestGenerator;

class TestGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var Config|MockObject */
    private $config;

    /** @var RendererInterface|MockObject */
    private $renderer;

    /** @var FileSystemInterface|MockObject */
    private $fileSystem;

    /** @var SutProviderInterface|MockObject */
    private $sutProvider;

    /** @var TestGenerator */
    private $sut;

    /**
     * {@inheritdoc}
    */
    public function setUp()
    {
        $this->config = Mockery::mock(Config::class);
        $this->renderer = Mockery::mock(RendererInterface::class);
        $this->fileSystem = Mockery::mock(FileSystemInterface::class);
        $this->sutProvider = Mockery::mock(SutProviderInterface::class);

        $this->sut = new TestGenerator(
            $this->config,
            $this->renderer,
            $this->fileSystem,
            $this->sutProvider    
        );
    }

    public function testGenerate()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
```

Run `bin/console unigen:generate` to get more help if needed
