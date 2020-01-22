### Bundle provides `Symfony 5` integration into mmi-mmi package

---
1. Router
    * Routes as before are using `\Mmi\Mvc\RouterConfig` as main route definition class
    * In order to get routes loaded, the result object needs to be registered as `tagged service` with tag `mmi.route` used, check [MmiRouterCompilerPass](/src/DependencyInjection/CompilerPass/MmiRoutesCompilerPass.php)

---
Tags:
* `mmi.route` - `\Mmi\Mvc\RouterConfig`
