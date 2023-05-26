<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

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
        'css/style.css',
        'bootstrap.css',
        'meanmenu.css',
        'normalize.css',
        'bootstrap.css.map',
        'bootstrap.min.css',
        'bootstrap.min.css.map',
        'nice-select.css',
        'Dash/assets/css/styles.css',
        'Dash/assets/css/styles.min.css',
        'Dash/assets/css/icons/tabler-icons/tabler-icons.css',
    ];
    public $js = [
        'bootstrap.js',
        'bootstrap.js.map',
        'bootstrap.min.js',
        'bootstrap.min.js.map',
        'custom.js',
        'Dash/assets/js/app.min.js',
        'Dash/assets/js/dashboard.js',
        'Dash/assets/js/sidebarmenu.js',
    ];
    public $scss = [
        'Dash/assets/scss/component/_card.scss',
        'Dash/assets/scss/component/_reboot.scss',
        'Dash/assets/scss/layouts/_header.scss',
        'Dash/assets/scss/layouts/_layouts.scss',
        'Dash/assets/scss/layouts/_sidebar.scss',
        'Dash/assets/scss/pages/_dashboard1.scss',
        'Dash/assets/scss/utilities/_background.scss',
        'Dash/assets/scss/utilities/_icon-size.scss',
        'Dash/assets/scss/variables/_theme-variables.scss',
        'Dash/assets/scss/variables/_variables.scss',
        'Dash/assets/scss/component/_card.scss',
        'Dash/assets/scss/_styles.scss',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
