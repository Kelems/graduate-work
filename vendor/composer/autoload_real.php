<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc2f3a9ac4e9b79e6f302b2009aae2198
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitc2f3a9ac4e9b79e6f302b2009aae2198', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc2f3a9ac4e9b79e6f302b2009aae2198', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc2f3a9ac4e9b79e6f302b2009aae2198::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
