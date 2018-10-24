<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NilaiLamda */

$this->title = 'Create Nilai Lamda';
$this->params['breadcrumbs'][] = ['label' => 'Nilai Lamdas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-lamda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
