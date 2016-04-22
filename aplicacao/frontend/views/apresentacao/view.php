<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */

$this->title = $model->idapresentacao;
$this->params['breadcrumbs'][] = ['label' => 'Apresentacao', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-view">

    <h1><?= 'Apresentacao: '.$model->nome; ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->idapresentacao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Remover', ['delete', 'id' => $model->idapresentacao], [
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
            'data_hora_inicio',
            'data_hora_fim'

            
        ],
    ]) ?>

</div>
