<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DataKriteria */

$this->title = 'Create Data Kriteria';
$this->params['breadcrumbs'][] = ['label' => 'Data Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-kriteria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
