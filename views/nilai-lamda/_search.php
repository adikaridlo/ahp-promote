<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NilaiLamdaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nilai-lamda-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'komunikasi') ?>

    <?= $form->field($model, 'kerjasama') ?>

    <?= $form->field($model, 'kejujuran') ?>

    <?= $form->field($model, 'interpesonal') ?>

    <?php // echo $form->field($model, 'eigin') ?>

    <?php // echo $form->field($model, 'lamda') ?>

    <?php // echo $form->field($model, 'maks') ?>

    <?php // echo $form->field($model, 'ci') ?>

    <?php // echo $form->field($model, 'ri') ?>

    <?php // echo $form->field($model, 'rci') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
