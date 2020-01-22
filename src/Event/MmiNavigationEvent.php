<?php
declare(strict_types=1);

namespace NowaEra\MmiBundle\Event;

use Mmi\Navigation\NavigationConfig;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class MmiNavigationEvent
 * Package NowaEra\MmiBundle\Event
 */
class MmiNavigationEvent extends Event
{
    /** @var NavigationConfig */
    private $rootNavigation;

    /**
     * MmiNavigationEvent constructor.
     *
     * @param NavigationConfig $rootNavigation
     */
    public function __construct(NavigationConfig $rootNavigation)
    {
        $this->rootNavigation = $rootNavigation;
    }

    /**
     * @return NavigationConfig
     */
    public function getRootNavigation(): NavigationConfig
    {
        return $this->rootNavigation;
    }
}
