<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TableKaryawan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="table-karyawan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'komunikasi')->textInput() ?>

    <?= $form->field($model, 'kerjasama')->textInput() ?>

    <?= $form->field($model, 'kejujuran')->textInput() ?>

    <?= $form->field($model, 'interpesonal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
