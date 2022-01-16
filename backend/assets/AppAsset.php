<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700',
        '/css/nucleo-icons.css',
        '/css/nucleo-svg.css',
        'https://fonts.googleapis.com/icon?family=Material+Icons+Round',
        '/css/material-dashboard.css?v=3.0.0',
        'css/site.css'
    ];
    public $js = [
        '/js/core/popper.min.js',
        '/js/core/bootstrap.min.js',
        '/js/plugins/perfect-scrollbar.min.js',
        '/js/plugins/smooth-scrollbar.min.js',
        'https://kit.fontawesome.com/42d5adcbca.js',
        'js/main.js'
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap4\BootstrapAsset',
    ];
}
