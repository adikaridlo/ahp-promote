<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TableKriteria */

$this->title = 'Create Table Kriteria';
$this->params['breadcrumbs'][] = ['label' => 'Table Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-kriteria-create">
	<center>
    	<h1><?= Html::encode($this->title) ?></h1>
	</center>

    <?= $this->render('_form', [
        'model' => $model,
        'labels' => $labels
    ]) ?>

</div>
