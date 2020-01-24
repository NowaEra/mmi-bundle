<?php
declare(strict_types=1);

namespace NowaEra\MmiBundle\Factory;

use Mmi\App\FrontController;

/**
 * Class FontControllerFactory
 * Package NowaEra\MmiBundle\Factory
 */
class FrontControllerFactory
{
    public function create(): FrontController
    {
        return FrontController::getInstance(true);
    }
}
