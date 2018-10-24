<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
// use yii\bootstrap\Nav;
// use yii\bootstrap\NavBar;
// use yii\widgets\Breadcrumbs;
use app\assets\LoginAsset;
use app\widgets\Alert;

LoginAsset::register($this);
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
    <!-- <body class="login"  style="background-color: #1f1f1f!important"> -->
    <body> 
        <?php $this->beginBody() ?>
            <?php //echo Alert::widget() ?>
        	<?php echo $content; ?>
        		
    	<?php $this->endBody() ?>
    </body>
    <script>$('input').attr('autocomplete','off');</script>
</html>
<?php $this->endPage() ?>