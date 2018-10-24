<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MatrixKriteria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matrix-kriteria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'komunikasi')->textInput() ?>

    <?= $form->field($model, 'kerjasama')->textInput() ?>

    <?= $form->field($model, 'kejujuran')->textInput() ?>

    <?= $form->field($model, 'interpersonal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
