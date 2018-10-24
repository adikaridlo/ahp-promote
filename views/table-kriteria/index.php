<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TableKriteriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Table Kriteria';
$this->params['breadcrumbs'][] = $this->title;
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
                <?php Pjax::begin(['enablePushState' => false,'timeout' => 3000, 'id' => 'myPjax']);?>
                <?php  echo $this->render('_form', ['model' => $model, 'labels' => $labels]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>