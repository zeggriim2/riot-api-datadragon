<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class RiotApiDataDragonExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/Config'));
        $loader->load('services.yaml');
    }

    public function prepend(ContainerBuilder $container): void
    {
        if ($container->hasExtension('framework')) {
            $container->prependExtensionConfig('framework', $this->getConfigHttpClient());
        }
    }

    private function getConfigHttpClient(): array
    {
        return [
            'http_client' =>
                [
                    'scoped_clients' =>
                        [
                            'riot.api' => '%env(string:API_RIO_BASE_URI)%'
                        ]
                ]
        ];
    }
}
