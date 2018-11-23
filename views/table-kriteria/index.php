<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TableKriteriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Table Kriteria';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss($this->render('_tab.css'));
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
                <!-- Start Tab -->
                    <div class="portlet light bordered">
                        <div class="portlet-body nav-center">
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a href="#tab_1" data-toggle="tab"> Tabel Kriteria </a>
                                </li>
                                <li>
                                    <a href="#tab_2" data-toggle="tab"> Metrik Kriteria </a>
                                </li>
                            </ul>
                        </div>
                            <div class="portlet-body nav-center">
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="tab_1">
                                    <?php Pjax::begin(['enablePushState' => false,'timeout' => 3000, 'id' => 'myPjax']);?>
                                    <?php echo $this->render('_form', ['model' => $model, 'labels' => $labels]); ?>
                                    <?php Pjax::end(); ?>
                                </div>
                                <div class="tab-pane fade" id="tab_2">
                                    <?php Pjax::begin(['enablePushState' => false,'timeout' => 3000, 'id' => 'myPjax']);?>
                                    <?php echo $this->render('_update_metrix', ['model' => $model, 'labels' => $labels]); ?>
                                    <?php Pjax::end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- End Tab -->
        </div>
        </div>
    </div>
</div>