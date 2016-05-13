<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use frontend\models\ParteSearch;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ParteSeach*/
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Partes da apresentção: '.$apresentacao->nome;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Voltar', ['apresentacao/index'], ['class' => 'btn btn-primary']) ?>
    </p>
  
    <?= DetailView::widget([
        'model' => $apresentacao,
        'attributes' => [    
            'nome',
            'data_hora_inicio',
            'data_hora_fim',
            [                      // the owner name of the model
                'label' => 'Obs:',
                'value' => 'Somente visíveis partes com tempo maior que zero',
            ]
        ],
    ]) ?>
    <p>
        <?= Html::a('Cadastrar Parte', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nome',
            'tempo',
            ['class' => 'yii\grid\PersonalActionColumn'],
        ],
    ]); ?>

</div>
