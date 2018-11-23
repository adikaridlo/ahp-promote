<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TableKaryawan */

$this->title = 'Create Table Karyawan';
$this->params['breadcrumbs'][] = ['label' => 'Table Karyawans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-karyawan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
