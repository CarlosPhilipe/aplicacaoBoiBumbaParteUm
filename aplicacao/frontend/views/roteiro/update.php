<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Roteiro */

$this->title = 'Update Roteiro: ' . ' ' . $model->idroteiro;
$this->params['breadcrumbs'][] = ['label' => 'Roteiros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idroteiro, 'url' => ['view', 'id' => $model->idroteiro]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="roteiro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
