<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TableKriteria */

$this->title = 'Update Table Kriteria: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Table Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-kriteria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'labels' => $labels
    ]) ?>

</div>
