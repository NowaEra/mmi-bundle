<?php
declare(strict_types=1);

namespace NowaEra\MmiBundle\DependencyInjection\CompilerPass;

use NowaEra\MmiBundle\Mvc\Structure;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

/**
 * Class MmiStrucutreCompilerPass
 * Package NowaEra\MmiBundle\DependencyInjection\CompilerPass
 */
class MaiStructureCompilerPass implements CompilerPassInterface
{
    const STRUCTURE_SERVICE_ID = 'mmi_structure';
    const STRUCTURE_ARRAY_ID   = 'mmi.structure.array';

    /**
     * You can modify the container here before it is dumped to PHP code.
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition(self::STRUCTURE_SERVICE_ID)) {
            return;
        }

        $definition = $container->getDefinition(self::STRUCTURE_SERVICE_ID);
        $definition->setConfigurator(
            function (ContainerConfigurator $configurator) {
                /** @var Structure $service */
                $service = $configurator->services()->get(self::STRUCTURE_SERVICE_ID);
                $configurator->parameters()->set(
                    self::STRUCTURE_ARRAY_ID,
                    $service->getStructure()
                )
                ;
            }
        );
    }
}
