<?php
declare(strict_types=1);

namespace NowaEra\MmiBundle;

use NowaEra\MmiBundle\DependencyInjection\CompilerPass\MmiRoutesCompilerPass;
use NowaEra\MmiBundle\DependencyInjection\CompilerPass\MmiStructureCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class MmiBundle
 */
class MmiBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new MmiRoutesCompilerPass());
        $container->addCompilerPass(new MmiStructureCompilerPass());
    }
}
