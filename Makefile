#---VARIABLES---------------------------------#
#---DOCKER---#
DOCKER = docker
DOCKER_RUN = $(DOCKER) run
DOCKER_COMPOSE = $(shell docker compose version > /dev/null 2>&1 && echo "docker compose" || echo "docker-compose")
DOCKER_COMPOSE_UP = $(DOCKER_COMPOSE) up -d
DOCKER_COMPOSE_STOP = $(DOCKER_COMPOSE) stop
# Docker containers
PHP_CONT = $(DOCKER_COMPOSE) exec php

# Executables
PHP      = $(PHP_CONT) php
COMPOSER = $(PHP_CONT) composer
SYMFONY  = $(PHP) bin/console
PHPUNIT  = $(PHP) vendor/bin/phpunit

#------------#
#---PHPQA---#
PHPQA = jakzal/phpqa:php8.2-debian
DOCKER_RUN_FLAGS ?= $(shell \
  FLAGS=""; \
  if [ -t 0 ]; then FLAGS="$${FLAGS} -i"; fi; \
  if [ -t 1 ]; then FLAGS="$${FLAGS} -t"; fi; \
  echo "$${FLAGS}"; \
)
PHPQA_RUN = $(DOCKER_RUN) --init $(DOCKER_RUN_FLAGS) --rm -v $(PWD):/project -w /project $(PHPQA)
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
	$(PHPQA_RUN) php-cs-fixer fix --diff --verbose --dry-run --config ".php-cs-fixer.dist.php"
.PHONY: qa-cs-fixer-dry-run

qa-cs-fixer: ## Run php-cs-fixer.
	$(PHPQA_RUN) php-cs-fixer fix --verbose --config ".php-cs-fixer.dist.php" .
.PHONY: qa-cs-fixer

qa-phpstan: ## Run PHPStan static analysis.
	$(PHPQA_RUN) phpstan analyse src tests --configuration phpstan.neon --memory-limit=1G
.PHONY: qa-phpstan

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
	$(PHPQA_RUN) composer install
.PHONY: install

test:
	@$(PHPUNIT) --do-not-cache-result

test-dragon:
	@$(PHPUNIT) --do-not-cache-result --group dragon

test-league:
	@$(PHPUNIT) --do-not-cache-result --group league

## —— Composer 🧙 ——————————————————————————————————————————————————————————————
composer: ## Run composer, pass the parameter "c=" to run a given command, example: make composer c='req symfony/orm-pack'
	@$(eval c ?=)
	@$(COMPOSER) $(c)

vendor: ## Install vendors according to the current composer.lock file
vendor: c=install --prefer-dist --no-dev --no-progress --no-scripts --no-interaction
vendor: composer