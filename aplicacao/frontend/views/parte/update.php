<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */

$this->title = 'Atualizar Parte: ' . ' ' . $model->idparte;
$this->params['breadcrumbs'][] = ['label' => 'Parte', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idparte, 'url' => ['view', 'id' => $model->idparte]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="classes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
  		'model' => $model,
        'elementos' => $elementos,
        'elementosCkd' => $elementosCkd,
    ]) ?>

</div>
