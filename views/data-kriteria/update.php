<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataKriteria */

$this->title = 'Update Data Kriteria: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-kriteria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
