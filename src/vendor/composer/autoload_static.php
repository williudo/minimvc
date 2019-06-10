<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6dbe027b45d54cb65937f16fda92eeb8
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6dbe027b45d54cb65937f16fda92eeb8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6dbe027b45d54cb65937f16fda92eeb8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
