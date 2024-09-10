<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderIniteb5a4f5a8ae974ec6d2814e64c61f19d
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

        spl_autoload_register(array('ComposerAutoloaderIniteb5a4f5a8ae974ec6d2814e64c61f19d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderIniteb5a4f5a8ae974ec6d2814e64c61f19d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticIniteb5a4f5a8ae974ec6d2814e64c61f19d::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
