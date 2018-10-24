<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NilaiLamda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nilai-lamda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'komunikasi')->textInput() ?>

    <?= $form->field($model, 'kerjasama')->textInput() ?>

    <?= $form->field($model, 'kejujuran')->textInput() ?>

    <?= $form->field($model, 'interpesonal')->textInput() ?>

    <?= $form->field($model, 'eigin')->textInput() ?>

    <?= $form->field($model, 'lamda')->textInput() ?>

    <?= $form->field($model, 'maks')->textInput() ?>

    <?= $form->field($model, 'ci')->textInput() ?>

    <?= $form->field($model, 'ri')->textInput() ?>

    <?= $form->field($model, 'rci')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
