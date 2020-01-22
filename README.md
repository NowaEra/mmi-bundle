### Bundle provides `Symfony 5` integration into mmi-mmi package

---
1. Router
a) Routes as before are using `\Mmi\Mvc\RouterConfig` as main route definition class
b) In order to get routes loaded, the result object needs to be registered as `tagged service` with tag `mmi.route` used

@see `NowaEra\MmiBundle\DependencyInjection\CompilerPass\MmiRoutesCompilerPass`
