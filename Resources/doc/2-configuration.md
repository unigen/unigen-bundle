### Configuration

```yml
uni_gen:
  config:
    test_case: 'TestCase'
    mock_framework: 'mockery'
    path_pattern: '/src\/([a-zA-Z\/]+)/'
    path_replacement_pattern: 'tests/${1}Test'
    namespace_pattern: '/namespace ([a-zA-Z]+\\)(.*);/'
    namespace_replacement_pattern: 'namespace ${1}Test\\${2};'
  render:
    twig:
      template: 'sut_template.php.twig'
      template_dir: '%kernel.project_dir%/vendor/unigen/unigen/src/Resources/views'
```

* `test_case` - Parent class that will be extend in generated test
* `mock_framework` - Test framework mockery or phpunit
* `path_pattern` - SUT directory regexp pattern
* `path_replacement_pattern` - Test directory replacement patter that will be used to generate target test path
* `namespace_pattern` - SUT namespace pattern
* `namespace_replacement_pattern` - Test namespace replacement patter that will be used to generate target test namepsace
* `template` Template used to generate test
* `template_dir` Twig templates directory

For example by default target namespace will add `Test` suffix to SUT namespace. So `Organization\ExampleClass` will generate test with namespace `Organization\Test\ExampleClass` in directory `./test/Organization/ExampleClassTest.php`. If you want to change namespace or target test directory just alter regexp in configuration file.
