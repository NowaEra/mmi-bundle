### Bundle provides `Symfony 5` integration into mmi-mmi package

---
1. Router
    * Routes as before are using `\Mmi\Mvc\RouterConfig` as main route definition class
    * In order to get routes loaded, the result object needs to be registered as `tagged service` with tag `mmi.route` used, check [MmiRouterCompilerPass](/src/DependencyInjection/CompilerPass/MmiRoutesCompilerPass.php)
2. Navigation
    * In order to attach navigation into root navigation, create `event listener / subscriber` and subscribe to `NowaEra\MmiBundle\Event\MmiNavigationEvent` which contains `rootNavigation` (->getRootNavigation(): NavigationConfig) and attach your custom navigation
    * Mange priority of navigation by setting up `tag's priority`

---
Tags:
* `mmi.route` - `\Mmi\Mvc\RouterConfig`

Events:
* `NowaEra\MmiBundle\Event\MmiNavigationEvent` - it's payload contains root navigation which may be extended by other navigation items
