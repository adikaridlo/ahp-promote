<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use app\widgets\Alert;
use yii\widget\Pjax;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php 
// $this->registerCssFile(Yii::getAlias('@web/') . 'css/_style_login.css', ['positions' => \yii\web\View:: POS_BEGIN]); 
// $this->registerCssFile(Yii::getAlias('@web/') . 'css/_style_login.css', ['depends' => [\app\assets\LoginAsset::className()]]); 
?>
<div class="container">
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4 text-center login-form">
      <section>
        <?= Html::img(Yii::getAlias('@web/img/remmit.png'), ['width'=>'200','text-align' => 'center'])?>
            <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => [
                        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                        'horizontalCssClasses' => [
                            'autoComplete'=>false,
                        ],
                    ],
                ]); ?>            

                <?= $form->field($model, 'email')->textInput([/*'autofocus' => true,*/'placeholder' => "Login with email", 'class' => 'form-control input-lg', 'style' => 'width:100%'])->label(false) ?>
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => "Password", 'class' => 'form-control input-lg', 'style' => 'margin-bottom:5px;'])->label(false) ?>

                <div class="form-actions" style="margin-top: 10%;">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>  
      </section>  
      </div>
      
      <div class="col-md-4"></div>
      

  </div>
</div>