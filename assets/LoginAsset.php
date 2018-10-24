<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        
       'theme/assets/global/plugins/bootstrap/css/bootstrap.min.css',
       'css/_style_login.css'
       // 'theme/assets/global/css/components.min.css',
       // 'theme/assets/pages/css/login.min.css',
       
    ];
    public $js = [

    ];

    public $depends = [
       // 'yii\web\YiiAsset',
       //  'yii\bootstrap\BootstrapAsset',
    ];
}
