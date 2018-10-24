<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
$action = Yii::$app->controller->action->id;

?>

<div class="users-form">

    <?php $form = ActiveForm::begin(['options' => [
        'enctype' => 'multipart/form-data'], 
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'label' => 'col-sm-4',
                    'offset' => 'col-sm-offset-3',
                    'wrapper' => 'col-sm-4',
                    'error' => '',
                    'hint' => '',
                ],
            ],
        ]); ?>

        <?= $form->field($model, 'new_password')->passwordInput()?>
        <?= $form->field($model, 'verify_password')->passwordInput()?>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-6">
                <?= Html::a('<span class="btn-label"><i class="glyphicon glyphicon-chevron-left"></i></span>Cancel', 
                    ['/admin/user-management/update?id='.$model->user_id],
                    [
                        'class' => 'btn btn-labeled btn-info m-b-5 pull-left',
                        'title' => 'Cancel'
                    ]) ?>&nbsp;

                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>&nbsp;

    <?php ActiveForm::end(); ?>

</div>