<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NilaiLamdaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nilai Lamdas';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile(Yii::getAlias('@web/'). 'css/style-grid.css', ['depends'=>['app\assets\AppAsset']]);
?>
<div class="row">
    <div class="col-md-12">                     
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="tools"> 
                    <a href="javascript:;" class="collapse"> </a> 
                    <a href="javascript:;" class="remove"> </a> 
                </div>
                <center>
                    <div class="caption" style="font-size: 18px;margin-top: 5px;"> 
                        <strong><?= Html::encode($this->title) ?></strong>
                    </div> 
                </center> 
            </div> 
            <div class="portlet-body"> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive"> 
                            <?php Pjax::begin(['enablePushState' => false,'timeout' => 3000, 'id' => 'myPjax']);?>

                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    'komunikasi',
                                    'kerjasama',
                                    'kejujuran',
                                    'interpesonal',
                                    'eigin',
                                    'lamda',
                                    'maks',
                                    'ci',
                                    'ri',
                                    'rci',

                                    ['class' => 'yii\grid\ActionColumn'],
                                ],
                                ]); ?>
                                <?php Pjax::end(); ?>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>