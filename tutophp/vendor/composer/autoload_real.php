<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit1bb1f88e0999ef53b3917f15f03497fa
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

        spl_autoload_register(array('ComposerAutoloaderInit1bb1f88e0999ef53b3917f15f03497fa', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit1bb1f88e0999ef53b3917f15f03497fa', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit1bb1f88e0999ef53b3917f15f03497fa::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
