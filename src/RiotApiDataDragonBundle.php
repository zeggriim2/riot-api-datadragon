<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class RiotApiDataDragonBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import('../config/services.yaml');
    }

    public function prependExtension(ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $builder->prependExtensionConfig('framework', $this->getConfigHttpClient());
    }

    private function getConfigHttpClient(): array
    {
        return [
            'http_client' => [
                'scoped_clients' => [
                    'riot.api' => ['base_uri' => '%env(string:API_RIO_BASE_URI)%'],
                ],
            ],
        ];
    }
}
