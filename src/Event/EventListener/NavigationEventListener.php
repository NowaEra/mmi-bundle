<?php
declare(strict_types=1);

namespace NowaEra\MmiBundle\Event\EventListener;

use Mmi\Navigation\NavigationConfig;
use NowaEra\MmiBundle\Event\MmiNavigationEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;

/**
 * Class NavigationEventListener
 * Package NowaEra\MmiBundle\Event\EventListener
 */
class NavigationEventListener
{
    /** @var EventDispatcherInterface */
    private $eventDispatcher;
    /**
     * @var NavigationConfig
     */
    private $navigationConfig;

    /**
     * NavigationEventListener constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     * @param NavigationConfig         $navigationConfig
     */
    public function __construct(EventDispatcherInterface $eventDispatcher, NavigationConfig $navigationConfig)
    {
        $this->eventDispatcher  = $eventDispatcher;
        $this->navigationConfig = $navigationConfig;
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        $event = new MmiNavigationEvent($this->navigationConfig);
        $this->eventDispatcher->dispatch($event);
    }
}
