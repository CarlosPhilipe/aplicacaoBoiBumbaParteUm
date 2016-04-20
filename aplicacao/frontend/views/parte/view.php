<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Parte', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-view">

    <h1><?= 'Parte: '.$model->nome; ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->idparte], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Remover', ['delete', 'id' => $model->idparte], [
            'class' => 'btn btn-default',
            'data' => [
                'confirm' => 'Tem certeza de que deseja excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
                      
        ],
    ]) ?>

</div>
