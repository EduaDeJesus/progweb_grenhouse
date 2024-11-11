<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitded25c094ef567e8fec7e6e1002904b4
{
    public static $files = array (
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
    );

    public static $prefixLengthsPsr4 = array (
        'y' => 
        array (
            'yii\\composer\\' => 13,
            'yii\\bootstrap4\\' => 15,
            'yii\\' => 4,
        ),
        'c' => 
        array (
            'cebe\\markdown\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'yii\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-composer',
        ),
        'yii\\bootstrap4\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-bootstrap4/src',
        ),
        'yii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2',
        ),
        'cebe\\markdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/cebe/markdown',
        ),
    );

    public static $prefixesPsr0 = array (
        'H' => 
        array (
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitded25c094ef567e8fec7e6e1002904b4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitded25c094ef567e8fec7e6e1002904b4::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitded25c094ef567e8fec7e6e1002904b4::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitded25c094ef567e8fec7e6e1002904b4::$classMap;

        }, null, ClassLoader::class);
    }
}
