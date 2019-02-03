[![Build Status](https://travis-ci.org/unigen/unigen.svg?branch=master)](https://travis-ci.org/unigen/unigen-bundle)

### UniGenBundle
UniGenBundle is a Symfony bundle that integrates [UniGen](https://github.com/unigen/unigen) a unit test generator for PHP which automatically generates unit tests for your classes.

### Installation

* `composer require --dev unigen/unigen-bundle`
* Enable bundle in your kernel file

### How to use

Just run command from cli

```bash
bin/console unigen:generate ./src/Controller/Example.php
```

or integrate it with IDE

##### PHPStorm integration

* File > Settings > Tools > External Tools
* Click green add icon
* Name it like you wish
* In `Program` input select your project bin/console path
* Under `Arguments` input paste unigen:generate $FilePath$
* Select your working directory
* To run generator for given class just click Tools > External Tools 


### Configuration

```yml
uni_gen:
  config:
    parent_test_case: 'TestCase'
    mock_object_framework: 'mockery'
    test_target_path_pattern: '/src\/([a-zA-Z\/]+)/'
    test_target_path_replacement_pattern: 'tests/${1}Test'
    namespace_pattern: '/([a-zA-Z]+\\)(.*)'
    namespace_replacement_pattern: '${1}Test\\{$2}'
  file_system:
    twig:
      template: 'sut_template.php.twig'
```

* `parent_test_case` - Parent class that will be extend in generated test
* `mock_object_framework` - Test framework mockery or phpunit
* `test_target_path_pattern` - SUT directory regexp pattern
* `test_target_path_replacement_pattern` - Test directory replacement patter that will be used to generate target test path
* `namespace_pattern` - SUT namespace pattern
* `namespace_replacement_pattern` - Test namespace replacement patter that will be used to generate target test namepsace
* `template` Template used to generate test

For example by default target namespace will add `Test` sufix to SUT namespace. So `Organization\ExampleClass` will generate test with namespace `Organization\Test\ExampleClass` in directory `./test/Organization/ExampleClassTest.php`. If you want to change namespace or target test directory just proper regexp in configuration file.

### License
This bundle is available under the MIT license.



