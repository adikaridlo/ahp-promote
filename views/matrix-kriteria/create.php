<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MatrixKriteria */

$this->title = 'Create Matrix Kriteria';
$this->params['breadcrumbs'][] = ['label' => 'Matrix Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matrix-kriteria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
