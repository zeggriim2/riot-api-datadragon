# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

A Symfony 6+ bundle providing a PHP wrapper for Riot Games APIs:
- **Data Dragon API**: Static game data (champions, items, summoners, profile icons, versions, languages)
- **League of Legends API**: Live game data (summoner info, match data, league rankings)

Distributed as `zeggriim/riot-api-datadragon` via Composer.

## Development Commands

### Testing
```bash
# All tests
make test

# Data Dragon API tests only
make test-dragon

# League API tests only
make test-league

# Specific test file
docker-compose exec php vendor/bin/phpunit tests/Endpoint/DataDragon/VersionApiTest.php
```

### Code Quality
```bash
# Check code style (dry-run)
make qa-cs-fixer-dry-run

# Fix code style
make qa-cs-fixer

# Static analysis
make qa-phpstan

# All QA checks
make qa-all
```

### Dependencies
```bash
make install
make composer c="update"
```

## Architecture

### Dual HTTP Client Design

Two separate clients for different Riot API surfaces:

**RiotApiDataDragonClient** (`src/RiotApiDataDragonClient.php`)
- Public static data from `https://ddragon.leagueoflegends.com`
- No authentication
- Config: `API_RIO_BASE_URI` env var

**RiotApiDataLeagueClient** (`src/RiotApiDataLeagueClient.php`)
- Live League API with authentication (`X-Riot-Token` header)
- Platform-specific URLs (e.g., `https://euw1.api.riotgames.com`)
- Config: `API_RIOT_KEY` env var, `Platform` enum for region
- Custom exception mapping for HTTP status codes (400→RequestException, 401→UnauthorizedException, 403→ForbiddenException, 404→DataNotFoundException, 415→UnsupportedMediaTypeException, 429→ServerLimitException, 500/503→ServerException)

### Structure des sources

```
src/
├── Cache/
│   ├── CachedHttpClientDecorator.php
│   └── CachedResponse.php
├── DataDragon/
│   ├── DataDragonApi.php / DataDragonApiInterface.php
│   ├── Dto/
│   │   ├── Champion/   (Champion, ChampionCollection, ChampionInfo, ChampionPassive, ChampionSkin, ChampionStats)
│   │   ├── Item/       (Item, ItemCollection, Gold)
│   │   ├── Language/   (Language, LanguageCollection)
│   │   ├── ProfileIcon/ (ProfileIcon, ProfileIconCollection, ProfileIconImage)
│   │   ├── Summoner/   (Summoner, SummonerCollection)
│   │   └── Image.php
│   ├── Endpoint/       (ChampionApi, ItemApi, LanguageApi, ProfileIconApi, SummonerApi, VersionApi + interfaces)
│   ├── Serializer/Normalizer/
│   │   ├── Champion/   (ChampionCollectionNormalizer, ChampionNormalizer)
│   │   ├── Item/       (ItemCollectionNormalizer, ItemNormalizer)
│   │   ├── ProfileIcon/ (ProfileIconCollectionNormalizer, ProfileIconNormalizer)
│   │   ├── Summoner/   (SummonerCollectionNormalizer, SummonerNormalizer)
│   │   └── LanguageCollectionNormalizer.php
│   └── Transformer/    (ChampionTransformer)
├── DataLeague/
│   ├── Dto/            (Summoner, ChampionMastery, ChampionMasteryCollection, NextSeasonMilestones, RewardConfig)
│   ├── Endpoint/       (AccountApi, ChampionApi, ChampionMasteryApi, LeagueApi, MatchApi, SummonerApi + interfaces)
│   ├── Filter/         (MatchFilter)
│   └── Serializer/Normalizer/
│       └── ChampionMastery/ (ChampionMasteryCollectionNormalizer, ChampionMasteryNormalizer, NextSeasonMilestonesNormalizer, RewardConfigNormalizer)
├── Enum/               (Division, MatchType, Platform, Queue, QueueId, Region, Tier)
└── Exception/          (DataNotFoundException, ForbiddenException, RequestException, ServerException, ServerLimitException, UnauthorizedException, UnsupportedMediaTypeException)
```

Each endpoint:
- Has an interface (e.g., `ChampionApiInterface`) and implementation
- Registered in `config/services.yaml` with interface alias
- Uses const URL patterns with sprintf (e.g., `URL_CHAMPIONS = '/cdn/%s/data/%s/champion.json'`)

### DataDragonApi Facade

Groups all Data Dragon endpoints (`src/DataDragon/DataDragonApi.php`):
```php
$api->versions()      // VersionApiInterface
$api->items()         // ItemApiInterface
$api->champions()     // ChampionApiInterface
$api->languages()     // LanguageApiInterface
$api->profileIcons()  // ProfileIconApiInterface
$api->summoners()     // SummonerApiInterface
```

### Data Transformation

Three-layer pattern for API responses:

1. **Raw array** from HTTP client
2. **Transformer** (`src/DataDragon/Transformer/`) uses Symfony Serializer with custom Normalizers
3. **DTO** (`src/DataDragon/Dto/` ou `src/DataLeague/Dto/`) strongly-typed objects

Example:
- `ChampionApi::getChampions()` → raw array
- `ChampionApi::getChampionsAsCollection()` → `ChampionCollection` DTO
- Uses `ChampionCollectionNormalizer` registered with `serializer.normalizer` tag

### Cache Layer

`CachedHttpClientDecorator` wraps the HTTP client to add caching via `CachedResponse`.

### Enums

`src/Enum/` contient les enums utilisés pour les paramètres API :
- `Platform` : région pour les URLs Live API (e.g. `EUW1`)
- `Region` : région globale (e.g. `EUROPE`)
- `Queue`, `QueueId`, `Tier`, `Division`, `MatchType`

## Code Standards

- PHP 8.2+ with strict types (`declare(strict_types=1);`)
- Constructor property promotion and readonly properties
- PhpCsFixer: `@PhpCsFixer`, `@PSR2`, `@PSR12`, `@Symfony` rules
- PHPStan level 8
- PHPUnit 10.4+ with `@group dragon` or `@group league` annotations

## Environment Variables

```bash
API_RIO_BASE_URI=https://ddragon.leagueoflegends.com  # Data Dragon base
API_RIOT_KEY=your_api_key                              # League API auth
```

## Adding New Endpoints

1. Create interface in `src/DataDragon/Endpoint/` or `src/DataLeague/Endpoint/`
2. Implement with appropriate client injection
3. Create DTOs in `src/DataDragon/Dto/` or `src/DataLeague/Dto/` if needed
4. Add Normalizer in `src/DataDragon/Serializer/Normalizer/` or `src/DataLeague/Serializer/Normalizer/` for complex deserialization
5. Create Transformer in `src/DataDragon/Transformer/` if DTO conversion needed
6. Register in `config/services.yaml`:
   ```yaml
   Namespace\NewApi:
       autowire: true
   Namespace\NewApiInterface: '@Namespace\NewApi'
   ```
7. Add to `DataDragonApi` facade if Data Dragon endpoint
8. Write tests with appropriate `@group` annotation
