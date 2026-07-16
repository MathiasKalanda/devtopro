<?php

/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

declare(strict_types=1);

namespace app\assets;

use yii\bootstrap5\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\View;
use yii\web\YiiAsset;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/sb-admin-2.min.js',
        // 'css/sb-admin-2.js',
        'acss/ll.min.css',
    ];
    public $js = [
        'js/color-mode.js',
        'js/jquery.min.js',
        'js/jquery.js',
        'js/sb-admin-2.js',
        'js/sb-admin-2.min.js',
        'js/bootstrap.bundle.min.js',
        'js/jquery.easing.min.js',
        'js/Chart.min.js',
        'js/chart-area-demo.js',
        'js/chart-pie-demo.js',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
    ];
}