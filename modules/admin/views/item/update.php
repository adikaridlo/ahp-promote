<?php
use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Permisssion', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="row">
    <div class="col-md-12">                     
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title"> 
                <div class="caption"> 
                <?= Html::encode($this->title) ?> 
                </div> 
                <div class="tools"> 
                    <a href="javascript:;" class="collapse"> </a> 
                    <a href="javascript:;" class="remove"> </a> 
                </div> 
            </div> 
            <div class="portlet-body"> 
                <div class="table-responsive">
                    <div class="tabbable-line boxless tabbable-reversed portlet light">
                        <!-- <div class="tab-content"> -->
                            <div class="ownership-status-form">
                                <?=
							        $this->render('_form', [
							            'model' => $model,
							        ]);
						        ?>
                            </div>  
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
