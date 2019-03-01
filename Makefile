help:
	@echo "Available commands:"
	@echo ""
	@echo "help                        List of available make commands"
	@echo "install                     Install PHP dependencies"
	@echo "unit                        Launch PHPUnit unit tests"

install:
	composer install

unit:
	@echo "PHPUNIT -- UNIT TESTS"
	vendor/bin/phpunit