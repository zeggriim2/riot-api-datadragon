#---VARIABLES---------------------------------#
#---DOCKER---#
DOCKER = docker
DOCKER_RUN = $(DOCKER) run
DOCKER_COMPOSE = docker-compose
DOCKER_COMPOSE_UP = $(DOCKER_COMPOSE) up -d
DOCKER_COMPOSE_STOP = $(DOCKER_COMPOSE) stop
#------------#
#---PHPQA---#
PHPQA = jakzal/phpqa:php8.2-debian
PHPQA_RUN = $(DOCKER_RUN) --init -it --rm -v $(PWD):/project -w /project $(PHPQA)
PHPQA_RUN_CI = $(DOCKER_RUN) --init --rm -v $(PWD):/project -w /project $(PHPQA)

#------------#
#---------------------------------------------#

## === 🆘  HELP ==================================================
help: ## Show this help.
	@echo "Symfony-And-Docker-Makefile"
	@echo "---------------------------"
	@echo "Usage: make [target]"
	@echo ""
	@echo "Targets:"
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
#---------------------------------------------#

## === 🐛  PHPQA =================================================
qa-cs-fixer-dry-run: ## Run php-cs-fixer in dry-run mode.
	$(PHPQA_RUN) php-cs-fixer fix ./src --verbose --dry-run --config ".php-cs-fixer.dist.php"
.PHONY: qa-cs-fixer-dry-run

qa-cs-fixer-dry-run-ci: ## Run php-cs-fixer in dry-run mode for CI.
	$(PHPQA_RUN_CI) php-cs-fixer fix ./src --verbose --dry-run --config ".php-cs-fixer.dist.php"
.PHONY: qa-cs-fixer-dry-run-ci

qa-cs-fixer: ## Run php-cs-fixer.
	$(PHPQA_RUN) php-cs-fixer fix ./src --verbose --config ".php-cs-fixer.dist.php"
.PHONY: qa-cs-fixer

qa-phpstan: ## Run PHPStan static analysis.
	$(PHPQA_RUN) phpstan analyse src tests --configuration phpstan.neon --memory-limit=1G
.PHONY: qa-phpstan

qa-phpstan-ci: ## Run PHPStan static analysis for CI.
	$(PHPQA_RUN_CI) phpstan analyse src tests --configuration phpstan.neon --memory-limit=1G
.PHONY: qa-phpstan-ci


qa-phpstan-baseline: ## Generate PHPStan baseline.
	$(PHPQA_RUN) phpstan analyse src tests --configuration phpstan.neon --generate-baseline
.PHONY: qa-phpstan-baseline

qa-all: ## Run all quality assurance tools.
	$(MAKE) qa-cs-fixer-dry-run
	$(MAKE) qa-phpstan
	$(MAKE) test
.PHONY: qa-all

qa-all-ci: ## Run all quality assurance tools for CI.
	$(MAKE) qa-cs-fixer-dry-run-ci
	$(MAKE) qa-phpstan-ci
	$(MAKE) test
.PHONY: qa-all-ci

#---------------------------------------------#


## === 🐋  DOCKER ================================================
docker-up: ## Start docker containers.
	$(DOCKER_COMPOSE_UP)
.PHONY: docker-up

docker-stop: ## Stop docker containers.
	$(DOCKER_COMPOSE_STOP)
.PHONY: docker-stop
#---------------------------------------------#

install: ## Install Package Composer
	composer install
.PHONY: install

test:
	./vendor/bin/phpunit --do-not-cache-result
.PHONY: test

test-dragon:
	./vendor/bin/phpunit --do-not-cache-result --group dragon
.PHONY: test-dragon

test-league:
	./vendor/bin/phpunit --do-not-cache-result --group league
.PHONY: test-league