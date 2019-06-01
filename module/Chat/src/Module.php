<?php
namespace Chat;

class Module
{
    public function getConfig()
    {
	$config = [];
        $configFiles = [
            __DIR__ . '/../config/module.config.php',
            __DIR__ . '/../config/doctrine.config.php',  // configuration for doctrine
        ];

        // merge all module config options
        foreach ($configFiles as $configFile) {
            $config = \Zend\Stdlib\ArrayUtils::merge($config, include $configFile, true);
        }

        return $config;
        //return include __DIR__ . '/../config/module.config.php';
    }
}
