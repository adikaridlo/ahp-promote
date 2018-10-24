<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MatrixKriteria */

$this->title = 'Update Matrix Kriteria: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Matrix Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="matrix-kriteria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
