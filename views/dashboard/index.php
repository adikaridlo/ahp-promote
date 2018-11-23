<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;
    use app\assets\ChartAsset;
    $this->registerCss($this->render('_style.css'));
    $this->title = 'Hasil Metode AHP';
    $this->params['breadcrumbs'][] = $this->title;
    $type = Yii::$app->user->identity->user_type;
?>
<div class="row">
    <!-- Start Chart -->
<div class="row">
    <!-- chart One -->
    
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-body">
                <!-- <label id="head-title">Daftar Perolehan Nilai</label> -->
                <?php /*Pjax::begin(['id' => 'pjax_year']) ?>
                <?php echo $this->render('_search_year', ['model' => $model]); ?>
                <?php Pjax::end() */?>
                <div id="highchart_1" style="height:500px;"></div>
            </div>
        </div>
    </div>
    
    <input id="users" type="hidden" value="<?php echo $type?>" name="">
</div>
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
                
                 <?php Pjax::begin(['enablePushState' => false,'timeout' => 3000, 'id' => 'myPjax']);
                     ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive"> 

                        <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'columns' => [
                            [
                                'class'         => 'yii\grid\SerialColumn',
                                'header'        => 'Peringkat', 
                                'headerOptions' => ['style'=> 'width: 1%;text-align:center;color:#337ab7'],
                                'contentOptions' => ['style'=> 'text-align:center'],
                            ],
                            [
                                'attribute' => 'nilai',
                                'label' => 'Nilai AHP',
                                'filter' => false,
                                'headerOptions' => ['style' => 'text-align:center;'],
                                'contentOptions' => ['style' => 'text-align:center']
                            ],
                            [
                                'attribute' => 'nama_karyawan',
                                'headerOptions' => ['style' => 'text-align:center'],
                                'contentOptions' => ['style' => 'text-align:center']
                            ],

                            // [
                            //     'class' => 'yii\grid\ActionColumn',
                            //     'header' => 'Action',
                            //     'headerOptions' => ['style'=> 'width: 10%;text-align:center;color:#337ab7;'],
                            //     'contentOptions'=>['style'=>'width: 15%;text-align:center;'],
                            //     'template' => '{view}{update}{delete}',// : '{view}';
                            //     'buttons' => [
                            //         'view' => function($url){
                            //             return Html::a('<button type="button" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-eye-open"></i></button>',
                            //                 $url,
                            //                 [
                            //                     'title' => 'View',
                            //                 ]
                            //             );
                            //         },
                            //         'update' => function($url){
                            //             return Html::a('<button type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i></button>',
                            //                 $url,
                            //                 [
                            //                     'title' => 'View',
                            //                 ]
                            //             );
                            //         },
                            //         'delete' => function($url){
                            //             return Html::a('<button type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button>',
                            //                 $url,
                            //                 [
                            //                     'title' => 'View',
                            //                 ]
                            //             );
                            //         }
                            //     ]
                            // ],
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
<?php ChartAsset::register($this);?>
<?php
    $this->registerJs($this->render('validate.js'), \yii\web\View:: POS_END);
    // $this->registerJs($this->render('_script_labels.js'), \yii\web\View:: POS_END);
    $this->registerJs($this->render('_script_chart_1.js'), \yii\web\View:: POS_END);
    // $this->registerJs($this->render('_script_chart_2.js'), \yii\web\View:: POS_END);


?>