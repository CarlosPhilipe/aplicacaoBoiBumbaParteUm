<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Classes */

$this->title = $model->idelemento;
$this->params['breadcrumbs'][] = ['label' => 'Elemento', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-view">

    <h1><?= 'Elemento: '.$model->nome; ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->idelemento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Remover', ['delete', 'id' => $model->idelemento], [
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
            'descricao',
            'tempoFormatado',
            'tipo_idtipo',
        ],
    ]) ?>

</div>
