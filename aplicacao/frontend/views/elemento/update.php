<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */

$this->title = 'Atualizar Classe: ' . ' ' . $model->idelemento;
$this->params['breadcrumbs'][] = ['label' => 'Elemento', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idelemento, 'url' => ['view', 'id' => $model->idelemento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="classes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
