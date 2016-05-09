<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */

$this->title = 'Atualizar Elemento: ' . ' ' . $model->idelemento;
$this->params['breadcrumbs'][] = ['label' => 'Partes', 'url' => ['parte/index']];
$this->params['breadcrumbs'][] = ['label' => 'Elementos', 'url' => ['elemento/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tipo' => $tipo,
    ]) ?>

</div>
