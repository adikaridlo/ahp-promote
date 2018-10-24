<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\Alert;


// AppAsset::register($this);
?>
<?php $this->beginPage() ?>

    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode(Yii::$app->name) ?></title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?=Yii::getAlias('@web/theme/assets/favicon/favicon_m.ico')?>" type="image/x-icon" />
        <link rel="apple-touch-icon" href="<?=Yii::getAlias('@web/theme/assets/favicon/favicon_m.ico')?>" type="image/x-icon">

        <?php $this->head() ?>
    </head>

        <?php $this->beginBody() ?>     

             <!-- landing pages -->
                <link href=<?=Yii::getAlias('@web/theme/landing_page/')."vendor/bootstrap/css/bootstrap.min.css"?> rel="stylesheet">

                <link href=<?=Yii::getAlias('@web/theme/landing_page/')."vendor/magnific-popup/magnific-popup.css"?> rel="stylesheet">

                <link href=<?=Yii::getAlias('@web/theme/landing_page/')."css/creative.min.css"?> rel="stylesheet">

                <link href=<?=Yii::getAlias('@web/theme/landing_page/')."css/custom-landingpage.css"?> rel="stylesheet">

               </head>

              <body id="page-top">
                <!-- Navigation -->
                <?= $content ?>
                
                <!-- Bootstrap core JavaScript -->
                <script src=<?=Yii::getAlias('@web/theme/landing_page/')."vendor/jquery/jquery.min.js"?>></script>
                <script src=<?=Yii::getAlias('@web/theme/landing_page/')."vendor/bootstrap/js/bootstrap.bundle.min.js"?>></script>

                <!-- Plugin JavaScript -->
                <script src=<?=Yii::getAlias('@web/theme/landing_page/')."vendor/jquery-easing/jquery.easing.min.js"?>></script>
                <script src=<?=Yii::getAlias('@web/theme/landing_page/')."vendor/scrollreveal/scrollreveal.min.js"?>></script>
                <script src=<?=Yii::getAlias('@web/theme/landing_page/')."vendor/magnific-popup/jquery.magnific-popup.min.js"?>></script>

                <!-- Custom scripts for this template -->
                <script src=<?=Yii::getAlias('@web/theme/landing_page/')."js/creative.min.js"?>></script>
            <?php $this->endBody() ?>
        </body>
      </html>
<?php $this->endPage() ?>