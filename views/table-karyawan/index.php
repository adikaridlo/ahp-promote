<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TableKaryawanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Table Karyawans';
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
                <p>
                    <?= Html::a('Tambah Karyawan', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                 <?php Pjax::begin(['enablePushState' => false,'timeout' => 3000, 'id' => 'myPjax']);
                     ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive"> 

                        <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            [
                                'class'         => 'yii\grid\SerialColumn',
                                'header'        => 'No', 
                                'headerOptions' => ['style'=> 'width: 3%;text-align:center;color:#337ab7'],
                                'contentOptions' => ['style'=> 'text-align:center'],
                            ],
                            [
                                'attribute' => 'nama',
                                'headerOptions' => ['style' => 'text-align:center'],
                                'contentOptions' => ['style' => 'text-align:center']
                            ],
                            [
                                'attribute' => 'komunikasi',
                                'headerOptions' => ['style' => 'text-align:center'],
                                'contentOptions' => ['style' => 'text-align:center']
                            ],
                            [
                                'attribute' => 'kerjasama',
                                'headerOptions' => ['style' => 'text-align:center'],
                                'contentOptions' => ['style' => 'text-align:center']
                            ],
                            [
                                'attribute' => 'kejujuran',
                                'headerOptions' => ['style' => 'text-align:center'],
                                'contentOptions' => ['style' => 'text-align:center']
                            ],
                            [
                                'attribute' => 'interpesonal',
                                'headerOptions' => ['style' => 'text-align:center'],
                                'contentOptions' => ['style' => 'text-align:center']
                            ],

                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Action',
                                'headerOptions' => ['style'=> 'width: 10%;text-align:center;color:#337ab7;'],
                                'contentOptions'=>['style'=>'width: 15%;text-align:center;'],
                                'template' => '{view}{update}{delete}',// : '{view}';
                                'buttons' => [
                                    'view' => function($url){
                                        return Html::a('<button type="button" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-eye-open"></i></button>',
                                            $url,
                                            [
                                                'title' => 'View',
                                            ]
                                        );
                                    },
                                    'update' => function($url){
                                        return Html::a('<button type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i></button>',
                                            $url,
                                            [
                                                'title' => 'View',
                                            ]
                                        );
                                    },
                                    'delete' => function($url){
                                        return Html::a('<button type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button>',
                                            $url,
                                            [
                                                'title' => 'View',
                                            ]
                                        );
                                    }
                                ]
                            ],
                        ],
                    ]); 
                    ?>
                        <?php Pjax::end(); ?>
                     </div>
                </div> 
            </div>
        </div>
    </div>
</div>
