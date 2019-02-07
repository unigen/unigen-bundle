### Installation

* Add dependency

```bash
composer require --dev unigen/unigen-bundle
```

* Enable bundle in your Kernel

```php
<?php

return [
    //...
    UniGen\Bundle\UniGenBundle\UniGenBundle::class => ['dev' => true, 'test' => true],
];
```

Or in your legacy application.

```php
<?php
// app/AppKernel.php
class AppKernel
{
    public function registerBundles()
    {
        $bundles = [
            //...
            new UniGen\Bundle\UniGenBundle\UniGenBundle(),
        ];

        //...

        return $bundles;
    }
}
```
