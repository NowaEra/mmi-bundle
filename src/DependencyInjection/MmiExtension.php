<?php
declare(strict_types=1);

namespace NowaEra\MmiBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class MmiExtension
 * Package NowaEra\MmiBundle\DependencyInjection
 */
class MmiExtension extends Extension
{

    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     *
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config        = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(
                __DIR__ . '/../Resources/config'
            )
        );
        $loader->load('router.yaml');
    }
}
