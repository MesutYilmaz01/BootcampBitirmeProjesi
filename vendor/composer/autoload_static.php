<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1a389dd701db276594701b6f3f9f4fb6
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Acme\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Acme\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1a389dd701db276594701b6f3f9f4fb6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1a389dd701db276594701b6f3f9f4fb6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
