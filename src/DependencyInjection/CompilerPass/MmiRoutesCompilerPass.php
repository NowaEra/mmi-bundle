<?php
declare(strict_types=1);

namespace NowaEra\MmiBundle\DependencyInjection\CompilerPass;

use Mmi\Mvc\RouterConfig;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class MmiRoutesCompilerPass
 * Package NowaEra\MmiBundle\DependencyInjection\CompilerPass
 */
class MmiRoutesCompilerPass implements CompilerPassInterface
{
    const ROUTER_CONFIG_SERVICE_TAG = 'mmi_router_config';
    const ROUTER_TAG                = 'mmi.route';

    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition(self::ROUTER_CONFIG_SERVICE_TAG)) {
            return;
        }

        $routerConfigDefinition = $container->getDefinition(
            self::ROUTER_CONFIG_SERVICE_TAG
        );

        foreach ($container->findTaggedServiceIds(self::ROUTER_TAG) as $id => $tag) {
            $serviceRoutesDefinitionId = sprintf('%s.%s', $id, 'routes');
            $serviceRoutesDefinition   = new Definition(RouterConfig::class);
            $serviceRoutesDefinition->setFactory([new Reference($id), 'getRoutes']);
            $container->setDefinition(
                $serviceRoutesDefinitionId,
                $serviceRoutesDefinition
            );
            $routerConfigDefinition->addMethodCall(
                'setRoutes',
                [
                    new Reference(
                        $serviceRoutesDefinitionId
                    )
                ]
            );
        }
    }
}
