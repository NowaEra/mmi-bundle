<?php

namespace NowaEra\MmiBundle\DependencyInjection\CompilerPass;

use Mmi\Mvc\Structure;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class MmiStructureCompilerPass
 *
 * @package NowaEra\MmiBundle\DependencyInjection\CompilerPass
 */
class MmiStructureCompilerPass implements CompilerPassInterface
{
    const MMI_STRUCTURE_ID    = 'mmi_structure';
    const MMI_STRUCTURE_ARRAY = 'mmi.structure.array';

    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition(self::MMI_STRUCTURE_ID)) {
            return;
        }

        /** @var Structure $service */
        $service    = $container->get(self::MMI_STRUCTURE_ID);
        $definition = $container->getDefinition(self::MMI_STRUCTURE_ID);
        $container->setParameter(self::MMI_STRUCTURE_ARRAY, $service->getStructure());
    }
}
