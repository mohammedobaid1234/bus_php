<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdff16ec5a6cbfbdc8dbcbfb26b2bae04
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdff16ec5a6cbfbdc8dbcbfb26b2bae04::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdff16ec5a6cbfbdc8dbcbfb26b2bae04::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdff16ec5a6cbfbdc8dbcbfb26b2bae04::$classMap;

        }, null, ClassLoader::class);
    }
}
