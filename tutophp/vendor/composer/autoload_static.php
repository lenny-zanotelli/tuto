<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1bb1f88e0999ef53b3917f15f03497fa
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Torigon\\Tutophp\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Torigon\\Tutophp\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1bb1f88e0999ef53b3917f15f03497fa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1bb1f88e0999ef53b3917f15f03497fa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1bb1f88e0999ef53b3917f15f03497fa::$classMap;

        }, null, ClassLoader::class);
    }
}
