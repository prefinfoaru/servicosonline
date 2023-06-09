<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd9c439a4cdba0b68fc4420f7785ded18
{
    public static $files = array (
        'cfe4039aa2a78ca88e07dadb7b1c6126' => __DIR__ . '/../..' . '/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Apps\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Apps\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd9c439a4cdba0b68fc4420f7785ded18::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd9c439a4cdba0b68fc4420f7785ded18::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd9c439a4cdba0b68fc4420f7785ded18::$classMap;

        }, null, ClassLoader::class);
    }
}
