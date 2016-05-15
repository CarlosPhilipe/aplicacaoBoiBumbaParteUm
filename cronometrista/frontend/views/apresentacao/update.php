<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */

$this->title = 'Atualizar Apresentacao: ' . ' ' . $model->idapresentacao;
$this->params['breadcrumbs'][] = ['label' => 'Apresentacao', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idapresentacao, 'url' => ['view', 'id' => $model->idapresentacao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="classes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
