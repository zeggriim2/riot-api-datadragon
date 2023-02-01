test:
	vendor\bin\phpunit --coverage-html tests\coverage
.PHONY:test

cs-fixer:
	vendor\bin\php-cs-fixer fix --allow-risky yes -vvv
.PHONY:cs-fixer