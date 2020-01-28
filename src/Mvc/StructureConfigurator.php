<?php
declare(strict_types=1);

namespace NowaEra\MmiBundle\Mvc;

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

/**
 * Class StructureConfigurator
 * Package NowaEra\MmiBundle\Mvc
 */
class StructureConfigurator
{
    const STRUCTURE_SERVICE_ID = 'mmi_structure';
    const STRUCTURE_ARRAY_ID   = 'mmi.structure.array';

    public function __invoke(ContainerConfigurator $configurator)
    {
        /** @var Structure $service */
        $service = $configurator->services()->get(self::STRUCTURE_SERVICE_ID);
        $configurator
            ->parameters()
            ->set(
                self::STRUCTURE_ARRAY_ID,
                $service->getStructure()
            )
        ;
    }

}
