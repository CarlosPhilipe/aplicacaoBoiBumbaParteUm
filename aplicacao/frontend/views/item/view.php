<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\imagine\Image;

/* @var $this yii\web\View */
/* @var $model frontend\models\Item */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->iditem], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Remover', ['delete', 'id' => $model->iditem], [
            'class' => 'btn btn-default',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'descricao:ntext',
            [
                'label' =>'Imagem',
                'format' => 'html',
                'value' => Html::img($model['imagem'],['width' => '250px']),
            ]
            ,
            [
                'label' => 'Imagem URL',
                'value' => $model['imagem'],
            ],
        ],
    ]) ?>

</div>
