<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\DropdownHelpers;
use yii\helpers\Url;
use yii\web\View;
// $this->registerCssFile(Yii::getAlias('@web/theme/') . 'assets/global/plugins/select2/css/select2.min.css', ['position' => \yii\web\View:: POS_BEGIN]);
// $this->registerCssFile(Yii::getAlias('@web/theme/') . 'assets/global/plugins/select2/css/select2-bootstrap.min.css', ['position' => \yii\web\View:: POS_BEGIN]);
$this->registerCssFile(Yii::getAlias('@web/theme/') . 'assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css', ['position' => \yii\web\View:: POS_END]);
$this->registerCssFile(Yii::getAlias('@web/theme/') . 'assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css', ['position' => \yii\web\View:: POS_END]);
?>
<input id="curent-year" type="hidden" value="<?php echo date("Y") ?>">
<div class="row">
    <div class="col-md-3" style="float: right;">
       
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'year',[
        'template' => "{label}

        <div class=\"input-group date form_datetime bs-datetime\">
        {input}
        <span style='display: none;' class=\"input-group-addon\">
            <a class=\"btn default date-reset\" id='reset'>
                    <i class=\"fa fa-times\"></i>
            </a>
        </span>
        <span class=\"input-group-addon\">
        <button class=\"btn default date-set\" id='modelform-year' type=\"button\">
                <i class=\"fa fa-calendar\"></i>
        </button>
         </span>
        </div>{error}"
        ])->textInput(['class' => 'form-control date-picker year', 'id' => 'search-year','data-date-format' => "yyyy",'placeholder' => 'Search Year'])->label(''); ?>

    <?php ActiveForm::end(); ?>
 
    </div>

</div>
<?php
// $this->registerJsFile(Yii::getAlias('@web/theme/') . 'assets/global/plugins/select2/js/select2.full.min.js',['depends'=>['app\assets\AppAsset']]);
// $this->registerJsFile(Yii::getAlias('@web/theme/') . 'assets/pages/scripts/components-select2.min.js',['depends'=>['app\assets\AppAsset']]);
$this->registerJsFile(Yii::getAlias('@web/theme/') . 'assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',['depends'=>['app\assets\AppAsset']]);
$this->registerJsFile(Yii::getAlias('@web/theme/') . 'assets/pages/scripts/components-date-time-pickers.min.js',['depends'=>['app\assets\AppAsset']]);
$this->registerJs("
    $(\"#reset\").click(function() {
            $.pjax.reload({container: '#pjax_year', async: false});
        });
    var dt = $('#curent-year').val();
    $('#search-year').val(dt);
    $('.year').datepicker({
    minViewMode: 2,
    dateFormat: 'yy',
    autoclose: true,
});", View::POS_END);
?>