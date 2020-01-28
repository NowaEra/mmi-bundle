<?php
declare(strict_types=1);

namespace NowaEra\MmiBundle\Mvc;


/**
 * Class StructureParser
 * Package NowaEra\MmiBundle\Mvc
 */
class StructureParser
{

    /**
     * Katalogi konieczne w module
     * @var array
     */
    protected $moduleRequirements = [
        'IndexController.php',
        'WidgetController.php',
        'Resource',
        'Filter',
        'Model',
        'Orm',
        'Resource',
        'View',
        'Form'
    ];

    /**
     * Pobiera wszystkie moduły w aplikacji
     * @return array
     */
    public function getModules()
    {
        return array_merge($this->getSrcModules(), $this->getVendorModules());
    }

    /**
     * Pobieranie modułów aplikacyjnych z src
     * @return array
     */
    public function getSrcModules()
    {
        $modules = [];
        foreach (new \DirectoryIterator(BASE_PATH . 'src') as $module) {
            if (!$module->isDir() || $module->isDot() || !$this->moduleValid($module->getPathname())) {
                continue;
            }
            $modules[] = $module->getPathname();
        }
        return $modules;
    }

    /**
     * Pobranie modułów aplikacyjnych ze wszystkich vendorów
     * @return array
     */
    public function getVendorModules()
    {
        $modules = [];
        //iteracja po vendorach
        foreach ($this->getVendors() as $vendor) {
            //iteracja po modułach
            foreach (new \DirectoryIterator($vendor) as $module) {
                if (!$module->isDir() || $module->isDot() || !$this->moduleValid($module->getPathname())) {
                    continue;
                }
                $modules[] = $module->getPathname();
            }
        }
        return $modules;
    }

    /**
     * Zwraca dostępne moduły aplikacyjne w vendorach
     * @return array
     */
    public function getVendors()
    {
        $vendors = [];
        //brak vendorów
        if (!file_exists(BASE_PATH . 'vendor')) {
            return $vendors;
        }
        foreach (new \DirectoryIterator(BASE_PATH . 'vendor') as $vendor) {
            if (!$vendor->isDir() || $vendor->isDot()) {
                continue;
            }
            foreach (new \DirectoryIterator($vendor->getPathname()) as $vendorName) {
                if (!$vendorName->isDir() || $vendorName->isDot() || !file_exists($vendorName->getPathname() . '/src')) {
                    continue;
                }
                $vendors[] = $vendorName->getPathname() . '/src';
            }
        }
        return $vendors;
    }

    /**
     * Bada poprawność modułu
     * @param string $modulePath
     * @return boolean
     */
    protected function moduleValid($modulePath)
    {
        //iteracja po wymaganych katalogach
        foreach ($this->moduleRequirements as $req) {
            //sprawdzanie istnienia katalogu
            if (file_exists($modulePath . '/' . $req)) {
                return true;
            }
        }
        return false;
    }
}
