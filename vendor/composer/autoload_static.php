<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc2f3a9ac4e9b79e6f302b2009aae2198
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc2f3a9ac4e9b79e6f302b2009aae2198::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc2f3a9ac4e9b79e6f302b2009aae2198::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc2f3a9ac4e9b79e6f302b2009aae2198::$classMap;

        }, null, ClassLoader::class);
    }
}
