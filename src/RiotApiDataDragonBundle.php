<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use Zeggriim\RiotApiDataDragon\Cache\CachedHttpClientDecorator;

class RiotApiDataDragonBundle extends AbstractBundle
{
    private const DEFAULT_DATA_DRAGON_BASE_URI = 'https://ddragon.leagueoflegends.com';
    private const DEFAULT_RETRY_MAX = 3;
    private const DEFAULT_RETRY_DELAY_MS = 1000;
    private const DEFAULT_RETRY_MULTIPLIER = 2.0;
    private const DEFAULT_RETRY_MAX_DELAY_MS = 10000;
    private const DEFAULT_CACHE_TTL = 3600;

    public function configure(DefinitionConfigurator $definition): void
    {
        /** @phpstan-ignore method.notFound */
        $definition->rootNode()
            ->children()
                ->arrayNode('data_dragon')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('base_uri')
                            ->defaultValue(self::DEFAULT_DATA_DRAGON_BASE_URI)
                            ->info('Base URI for Data Dragon API')
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('cache')
                    ->addDefaultsIfNotSet()
                    ->info('Configuration for HTTP response caching')
                    ->children()
                        ->booleanNode('enabled')
                            ->defaultFalse()
                            ->info('Enable HTTP response caching for Data Dragon API')
                        ->end()
                        ->integerNode('ttl')
                            ->defaultValue(self::DEFAULT_CACHE_TTL)
                            ->info('Default cache TTL in seconds (default: 3600 = 1 hour)')
                        ->end()
                        ->scalarNode('pool')
                            ->defaultValue('cache.app')
                            ->info('Cache pool service ID to use')
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('retry')
                    ->addDefaultsIfNotSet()
                    ->info('Configuration for automatic retry on rate limit (429)')
                    ->children()
                        ->booleanNode('enabled')
                            ->defaultTrue()
                            ->info('Enable automatic retry on rate limit')
                        ->end()
                        ->integerNode('max_retries')
                            ->defaultValue(self::DEFAULT_RETRY_MAX)
                            ->info('Maximum number of retry attempts')
                        ->end()
                        ->integerNode('delay_ms')
                            ->defaultValue(self::DEFAULT_RETRY_DELAY_MS)
                            ->info('Initial delay in milliseconds before retry')
                        ->end()
                        ->floatNode('multiplier')
                            ->defaultValue(self::DEFAULT_RETRY_MULTIPLIER)
                            ->info('Multiplier for exponential backoff')
                        ->end()
                        ->integerNode('max_delay_ms')
                            ->defaultValue(self::DEFAULT_RETRY_MAX_DELAY_MS)
                            ->info('Maximum delay in milliseconds')
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import('../config/services.yaml');

        // Configure scoped HTTP client for Data Dragon with retry on 429
        $httpClientConfig = [
            'http_client' => [
                'scoped_clients' => [
                    'riot.api' => [
                        'base_uri' => $config['data_dragon']['base_uri'],
                    ],
                ],
            ],
        ];

        // Add retry configuration if enabled
        if ($config['retry']['enabled']) {
            $httpClientConfig['http_client']['scoped_clients']['riot.api']['retry_failed'] = [
                'enabled' => true,
                'max_retries' => $config['retry']['max_retries'],
                'delay' => $config['retry']['delay_ms'],
                'multiplier' => $config['retry']['multiplier'],
                'max_delay' => $config['retry']['max_delay_ms'],
                'http_codes' => [
                    429 => true, // Rate limit - retry with Retry-After header
                ],
            ];
        }

        $builder->prependExtensionConfig('framework', $httpClientConfig);

        // Configure cache decorator if enabled
        if ($config['cache']['enabled']) {
            $builder->register('riot_api.http_client.cached', CachedHttpClientDecorator::class)
                ->setDecoratedService('riot.api')
                ->setArguments([
                    new Reference('riot_api.http_client.cached.inner'),
                    new Reference($config['cache']['pool']),
                    $config['cache']['ttl'],
                ])
            ;
        }
    }
}
