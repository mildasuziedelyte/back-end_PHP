<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit34586035e63e939eea4e47d249497c44
{
    public static $classMap = array (
        'Agurkas' => __DIR__ . '/../..' . '/classes/Agurkas.php',
        'App' => __DIR__ . '/../..' . '/classes/App.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Darzove' => __DIR__ . '/../..' . '/classes/Darzove.php',
        'Pomidoras' => __DIR__ . '/../..' . '/classes/Pomidoras.php',
        'Vegetable' => __DIR__ . '/../..' . '/classes/Vegetable.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit34586035e63e939eea4e47d249497c44::$classMap;

        }, null, ClassLoader::class);
    }
}