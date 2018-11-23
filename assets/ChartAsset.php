<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ChartAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      
    ];
    public $js = [
       
       // ..... jquery error
       'theme/assets/global/plugins/highcharts/js/highcharts.js',
       'theme/assets/global/plugins/highcharts/js/modules/no-data-to-display.js',
       // 'theme/assets/global/plugins/highcharts/js/highcharts-3d.js',
       // 'theme/assets/global/plugins/highcharts/js/highcharts-more.js',
       // 'theme/assets/pages/scripts/charts-highcharts.min.js',
       // end jquery error
    ];
    public $depends = [
       'yii\web\YiiAsset',
       //  'yii\bootstrap\BootstrapAsset',
    ];
}