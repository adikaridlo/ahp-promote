<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TableKaryawan */

$this->title = 'Update Table Karyawan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Table Karyawans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-karyawan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
