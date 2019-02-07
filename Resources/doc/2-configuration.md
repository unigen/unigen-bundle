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
      template_dir: './Resources/config/views'
```

* `parent_test_case` - Parent class that will be extend in generated test
* `mock_object_framework` - Test framework mockery or phpunit
* `test_target_path_pattern` - SUT directory regexp pattern
* `test_target_path_replacement_pattern` - Test directory replacement patter that will be used to generate target test path
* `namespace_pattern` - SUT namespace pattern
* `namespace_replacement_pattern` - Test namespace replacement patter that will be used to generate target test namepsace
* `template` Template used to generate test, twig namespace syntax is supported e.g. `@AcmeBlog/Blog/index.html.twig` for more read twig documentation

For example by default target namespace will add `Test` sufix to SUT namespace. So `Organization\ExampleClass` will generate test with namespace `Organization\Test\ExampleClass` in directory `./test/Organization/ExampleClassTest.php`. If you want to change namespace or target test directory just proper regexp in configuration file.
