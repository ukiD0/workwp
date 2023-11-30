<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4df50f989ecb0efc97fcfe88333df300
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kirki\\Field\\' => 12,
            'Kirki\\Control\\' => 14,
            'Kirki\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kirki\\Field\\' => 
        array (
            0 => __DIR__ . '/..' . '/kirki-framework/control-generic/src/Field',
            1 => __DIR__ . '/..' . '/kirki-framework/control-sortable/src/Field',
            2 => __DIR__ . '/..' . '/kirki-framework/control-slider/src/Field',
        ),
        'Kirki\\Control\\' => 
        array (
            0 => __DIR__ . '/..' . '/kirki-framework/control-base/src/Control',
            1 => __DIR__ . '/..' . '/kirki-framework/control-generic/src/Control',
            2 => __DIR__ . '/..' . '/kirki-framework/control-sortable/src/Control',
            3 => __DIR__ . '/..' . '/kirki-framework/control-slider/src/Control',
        ),
        'Kirki\\' => 
        array (
            0 => __DIR__ . '/..' . '/kirki-framework/url-getter/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4df50f989ecb0efc97fcfe88333df300::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4df50f989ecb0efc97fcfe88333df300::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
