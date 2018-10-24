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
        'options'=>['autoComplete'=>'off'], 
        // 'enableAjaxValidation' => true,
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'label' => 'col-sm-3',
                    'offset' => 'col-sm-offset-3',
                    'wrapper' => 'col-sm-4',
                    'error' => '',
                    'hint' => '',
                ],
            ],
        ]); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email',['enableAjaxValidation' => true])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
        <label class="control-label col-sm-3"></label>
            <div class="col-sm-6">
                <a href="<?php echo Yii::$app->urlManager->createUrl('/admin/user-management/reset-password?id='.$model->id)?>">Change Password ?</a>
            </div>
        </div>

        <?= $form->field($model, 'user_type')->dropDownList([ 'super_admin' => 'Super admin', 'admin' => 'Admin', 'merchant' => 'Merchant', 'sub_merchant' => 'Sub merchant', ], ['prompt' => ''])->hiddenInput(['value'=> 'admin'])->label(false); ?>

    <?php if ($action == 'create'): ?>
        <?= $form->field($model, 'password')->passwordInput(['value' => '', 'maxlength' => true]) ?>

        <?= $form->field($model, 'password_confirm')->passwordInput(['value' => '', 'maxlength' => true]) ?>
    <?php endif;?>

        <?= $form->field($model, 'mid_list')->textarea(['placeholder'=>'Separate each mid with comma']) ?>

        <!-- <?= $form->field($model, 'merchant_id')->textInput() ?> -->


        <div class="form-group">
            <label class="control-label col-sm-3"></label>
            <div class="col-sm-6">
                <?= Html::a('<span class="btn-label"><i class="glyphicon glyphicon-chevron-left"></i></span>Cancel', 
                    ['/admin/user-management/index'],
                    [
                        'class' => 'btn btn-labeled btn-info m-b-5 pull-left',
                        'title' => 'Cancel'
                    ]) ?>&nbsp;

                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>&nbsp;

    <?php ActiveForm::end(); ?>

</div>