test:
	vendor\bin\phpunit
.PHONY:test

cs-fixer:
	vendor\bin\php-cs-fixer fix --allow-risky yes -vvv
.PHONY:cs-fixer