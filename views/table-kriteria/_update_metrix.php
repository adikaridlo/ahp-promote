<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use app\models\TableKriteria;
/* @var $this yii\web\View */
/* @var $model app\models\TableKriteria */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile(Yii::getAlias('@web/theme/') . 'assets/global/plugins/select2/css/select2.min.css', ['position' => \yii\web\View:: POS_BEGIN]);
$this->registerCssFile(Yii::getAlias('@web/theme/') . 'assets/global/plugins/select2/css/select2-bootstrap.min.css', ['position' => \yii\web\View:: POS_BEGIN]);
?>

<div class="table-kriteria-form">

    <?php $form = ActiveForm::begin([
        'options' => ['autoComplete'=>'off'], 
        'layout' => 'horizontal',
        'action' => ['process-two/update-metrix'],
        'method' => 'POST',
        'fieldConfig' => [
            'template' => "<center>{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                    // 'offset' => 'col-sm-offset-9',
                'wrapper' => 'col-sm-3',
                'error' => '',
                'hint' => '',
                'enableAjaxValidation' => false,
            ],
        ],
        ]); ?>

    <?= $form->field($model, 'komunikasi', ['template' => "
    	<table class='table table-striped table-bordered' style=\"width: 70%\" align=\"center\">
      <tr>
      <td style='text-align:center;padding-top:2%;width:100px'>
      <label>$labels[1]</label>
      </td>
      <td>
      {input}
      </td>
      <td style='text-align:center;padding-top:2%;width:100px'>
      <label>$labels[4]</label>
      </td>
      </tr>


      </table>"])->dropDownList(
        TableKriteria::dataKriteria('komunikasi'),
        [
            'prompt'=>'',
            'class' => 'form-control select2',
            'placeholder'=>'Select Provider',
        ]
        ); ?>

      <?= $form->field($model, 'kerjasama', ['template' => "
         <table class='table table-striped table-bordered' style=\"width: 70%\" align=\"center\">
         <tr>
         <td style='text-align:center;padding-top:2%;width:100px'>
         <label>$labels[2]</label>
         </td>
         <td>
         {input}
         </td>
         <td style='text-align:center;padding-top:2%;width:100px'>
         <label>$labels[3]</label>
         </td>
         </tr>


     </table>"])->dropDownList(
        TableKriteria::dataKriteria('kerjasama'),
        [
            'prompt'=>'',
            'class' => 'form-control select2',
            'placeholder'=>'Select Provider',
        ]
        ); ?>

      <?= $form->field($model, 'kejujuran', ['template' => "
         <table class='table table-striped table-bordered' style=\"width: 70%\" align=\"center\">
         <tr>
         <td style='text-align:center;padding-top:2%;width:100px'>
         <label>$labels[3]</label>
         </td>
         <td>
         {input}
         </td>
         <td style='text-align:center;padding-top:2%;width:100px'>
         <label>$labels[2]</label>
         </td>
         </tr>


     </table>"])->dropDownList(
        TableKriteria::dataKriteria('kejujuran'),
        [
            'prompt'=>'',
            'class' => 'form-control select2',
            'placeholder'=>'Select Provider',
        ]
        ); ?>

      <?= $form->field($model, 'interpesonal', ['template' => "
         <table class='table table-striped table-bordered' style=\"width: 70%\" align=\"center\">
         <tr>
         <td style='text-align:center;padding-top:2%;width:100px'>
         <label>$labels[4]</label>
         </td>
         <td>
         {input}
         </td>
         <td style='text-align:center;padding-top:2%;width:100px'>
         <label>$labels[1]</label>
         </td>
         </tr>


     </table>"])->dropDownList(
        TableKriteria::dataKriteria('interpesonal'),
        [
            'prompt'=>'',
            'class' => 'form-control select2',
            'placeholder'=>'Select Provider',
        ]
        ); ?>

     <div class="form-group">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-12" style="text-align: center;">
            <?= Html::a('<span class="btn-label"><i class="glyphicon glyphicon-chevron-left"></i></span>Cancel', 
                ['index'],
                [
                    'class' => 'btn btn-labeled btn-info m-b-5 ',
                    'title' => 'Cancel'
                    ]) ?>&nbsp;

                    <?= Html::submitButton('Buat Metrix', ['class' => 'btn btn-success']) ?>
                </div>
            </div>&nbsp;

            <?php ActiveForm::end(); ?>

        </div>
        <?php
        $this->registerJsFile(Yii::getAlias('@web/theme/') . 'assets/global/plugins/select2/js/select2.full.min.js',['depends'=>['app\assets\AppAsset']]);
        $this->registerJsFile(Yii::getAlias('@web/theme/') . 'assets/pages/scripts/components-select2.min.js',['depends'=>['app\assets\AppAsset']]);
        ?>